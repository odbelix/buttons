<?php

namespace CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Session;
use CoreBundle\Entity\Question;
use CoreBundle\Entity\Option;
use CoreBundle\Entity\ClassroomQuestion;
use CoreBundle\Entity\Classroom;
use CoreBundle\Form\SessionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use CoreBundle\Form\QuestionType;

/**
 * Session controller.
 *
 * @Route("/active/session")
 */
class ActiveSessionController extends Controller
{
    /**
     * Lists all Session entities.
     *
     * @Route("/{id}", name="active_index")
     * @Method({"GET","POST"})
     */
    public function indexAction(Request $request,Session $session)
    {
        $em = $this->getDoctrine()->getManager();
        $classroom = $em->getRepository('CoreBundle:Classroom')->findOneBy(array('id' => $session->getClassroomId()));

        $questiontypes = $em->getRepository('CoreBundle:QuestionType')->findBy(array('available' => true));
        $question = $em->getRepository('CoreBundle:Question')->findOneBy(array('available' => true));
        $questions = $em->getRepository('CoreBundle:Question')->findBy(array('session_id' => $session->getId(),'available' => false));

        $sessionform = $this->createSessionFinishForm($session);
        $sessionform->handleRequest($request);

        if ( $session->getFinishedAt() != null ) {
            return $this->redirectToRoute('session_summary', array('id' => $session->getId()));
        }


        if ($sessionform->isSubmitted() && $sessionform->isValid()) {
             $em = $this->getDoctrine()->getManager();
             $session->setFinishedAt(new \DateTime("now"));
             $em->persist($session);
             $em->flush();

             //REDIRECT TO RESUMEN
             return $this->redirectToRoute('session_summary', array('id' => $session->getId()));
        }

        return $this->render('active/home.html.twig', array(
            'session' => $session,
            'classroom' => $classroom,
            'questiontypes' => $questiontypes,
            'question' => $question,
            'questions' => $questions,
            'sessionform' => $sessionform->createView(),
        ));
    }


    /**
    * Finish the session
    *
    * @Route("/finish", name="active_finish")
    * @Method("POST")
    */
    public function finishSessionAction(Request $request)
    {
        if ($request->isMethod('POST')) {

        }
    }


    /**
     * Active a Question
     *
     * @Route("/question/{id}/session/{session}/classroom/{classroom}", name="active_question")
     * @Method({"GET", "POST"})
     */
    public function activeQuestionAction(Request $request,Question $question,Session $session,Classroom $classroom)
    {
          $em = $this->getDoctrine()->getManager();
          $questiontype = $em->getRepository('CoreBundle:QuestionType')->findOneBy(array('id' => $question->getQuestionTypeId()));

          $form = $this->createAvailableQuestionForm($question, $session, $classroom);
          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {
               $em = $this->getDoctrine()->getManager();
               if ($question->getAvailable() == true )
                  $question->setAvailable(false);
               else
                  $question->setAvailable(true);
               $em->persist($question);
               $em->flush();

               //REDIRECT TO RESUMEN
               return $this->redirectToRoute('active_question', array('id' => $question->getId(),
                           'session' => $session->getId(), 'classroom' => $classroom->getId() ));
          }

          return $this->render('active/question_active.html.twig', array(
              'session' => $session,
              'question' => $question,
              'classroom' => $classroom,
              'questiontype' => $questiontype,
              'form' => $form->createView(),
          ));
    }

    private function createAvailableQuestionForm(Question $question,Session $session,Classroom $classroom)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('active_question',
            array('id' => $question->getId(),'session' => $session->getId(), 'classroom' => $classroom->getId())
            ))
            ->setMethod('POST')
            ->getForm()
        ;

    }

    private function createSessionFinishForm(Session $session)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('active_index',
            array('id' => $session->getId())
            ))
            ->setMethod('POST')
            ->getForm()
        ;

    }


    /**
     * Creates a new Session entity.
     *
     * @Route("/question/new/{type}/{session}", name="active_question_new")
     * @Method({"GET", "POST"})
     */
    public function newQuestionAction(Request $request,$type,$session)
    {
          $em = $this->getDoctrine()->getManager();
          $session = $em->getRepository('CoreBundle:Session')->findOneBy(array('id' => $session));
          $classroom = $em->getRepository('CoreBundle:Classroom')->findOneBy(array('id' => $session->getClassroomId()));
          $questiontype = $em->getRepository('CoreBundle:QuestionType')->findOneBy(array('id' => $type));

          $question = new Question();
          $question->setQuestionType($questiontype);
          $question->setSession($session);

          //CHECK QuestionType
          if ($questiontype->getMultiplechoice() == true ) {
              $option1 = new Option();
              $question->getOptions()->add($option1);
              $option1->setQuestion($question);

              $option2 = new Option();
              $question->getOptions()->add($option2);
              $option2->setQuestion($question);

              $option3 = new Option();
              $question->getOptions()->add($option3);
              $option3->setQuestion($question);

              $option4 = new Option();
              $question->getOptions()->add($option4);
              $option4->setQuestion($question);
          }
          if ($questiontype->getOneoption() == true ) {
              $option1 = new Option();
              $option1->setIscorrect(true);
              $question->getOptions()->add($option1);
              $option1->setQuestion($question);

              $option2 = new Option();
              $question->getOptions()->add($option2);
              $option2->setQuestion($question);

              $option3 = new Option();
              $question->getOptions()->add($option3);
              $option3->setQuestion($question);

              $option4 = new Option();
              $question->getOptions()->add($option4);
              $option4->setQuestion($question);
          }
          if ($questiontype->getBoolean() == true ) {
              $optionTrue = new Option();
              $optionTrue->setDetail("Verdadero");
              $question->getOptions()->add($optionTrue);
              $optionTrue->setQuestion($question);

              $optionFalse = new Option();
              $optionFalse->setDetail("Falso");
              $question->getOptions()->add($optionFalse);
              $optionFalse->setQuestion($question);
          }

          $form = $this->createForm('CoreBundle\Form\QuestionType', $question);
          $form->handleRequest($request);
          //
          //
          if ($form->isSubmitted() && $form->isValid()) {
               $em = $this->getDoctrine()->getManager();
               $question->setCreatedAt(new \DateTime("now"));
               $question->setAvailable(true);
               $em->persist($question);
               $em->flush();
          //

               $classroomQuestion = new classroomQuestion();
               $classroomQuestion->setClassroom($classroom);
               $classroomQuestion->setCreatedAt(new \DateTime("now"));
               $classroomQuestion->setSession($session);
               $classroomQuestion->setQuestion($question);

               $em->persist($classroomQuestion);
               $em->flush();

               return $this->redirectToRoute('active_question', array('id' => $question->getId(),
                           'session' => $session->getId(), 'classroom' => $classroom->getId() ));
          }

          return $this->render('active/question.html.twig', array(
              'session' => $session,
              'classroom' => $classroom,
              'questiontype' => $questiontype,
              'form' => $form->createView(),
          ));
    }

    /**
     * Finds and displays a Session entity.
     *
     * @Route("/{id}", name="session_show")
     * @Method("GET")
     */
    public function showAction(Session $session)
    {
        $deleteForm = $this->createDeleteForm($session);

        return $this->render('session/show.html.twig', array(
            'session' => $session,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finish one Session
     *
     * @Route("/{id}/finish", name="session_finish")
     * @Method({"GET", "POST"})
     */
    public function finishAction(Request $request, Session $session)
    {
        $form = $this->createFormBuilder()
          ->setAction($this->generateUrl('session_finish', array('id' => $session->getId())))
          ->setMethod('POST')
          ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $session->setFinishedAt(new \DateTime("now"));
            $em->persist($session);
            $em->flush();

            return $this->redirectToRoute('session_index');
        }

        return $this->render('session/finish.html.twig', array(
            'session' => $session,
            'form' => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Session entity.
     *
     * @Route("/{id}/edit", name="session_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Session $session)
    {
        $deleteForm = $this->createDeleteForm($session);
        $editForm = $this->createForm('CoreBundle\Form\SessionType', $session);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($session);
            $em->flush();

            return $this->redirectToRoute('session_edit', array('id' => $session->getId()));
        }

        return $this->render('session/edit.html.twig', array(
            'session' => $session,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Session entity.
     *
     * @Route("/{id}", name="session_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Session $session)
    {
        $form = $this->createDeleteForm($session);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($session);
            $em->flush();
        }

        return $this->redirectToRoute('session_index');
    }

    /**
     * Creates a form to delete a Session entity.
     *
     * @param Session $session The Session entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Session $session)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('session_delete', array('id' => $session->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
