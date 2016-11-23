<?php

namespace CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Classroom;
use CoreBundle\Entity\Session;
use CoreBundle\Entity\Question;
use CoreBundle\Entity\User;
use CoreBundle\Form\ClassroomType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

/**
 * Classroom controller.
 *
 * @Route("/classroom")
 */
class ClassroomController extends Controller
{
    /**
     * Lists all Classroom entities.
     *
     * @Route("/", name="classroom_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $classrooms = $em->getRepository('CoreBundle:Classroom')->findBy(array('user_id' => $this->getUser()->getId()));

        return $this->render('classroom/index.html.twig', array(
            'classrooms' => $classrooms,
        ));
    }

    /**
     * Creates a new Classroom entity.
     *
     * @Route("/new", name="classroom_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $classroom = new Classroom();
        $form = $this->createForm('CoreBundle\Form\ClassroomType', $classroom);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $classroom->setCreatedAt(new \DateTime("now"));

            $user = $this->getUser();
            $classroom->setUser($user);

            $em->persist($classroom);
            $em->flush();

            return $this->redirectToRoute('classroom_show', array('id' => $classroom->getId()));
        }

        return $this->render('classroom/new.html.twig', array(
            'classroom' => $classroom,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Classroom entity.
     *
     * @Route("/{id}", name="classroom_show")
     * @Method("GET")
     */
    public function showAction(Classroom $classroom)
    {
        $deleteForm = $this->createDeleteForm($classroom);

        return $this->render('classroom/show.html.twig', array(
            'classroom' => $classroom,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Finds and displays a Classroom entity.
     *
     * @Route("/home/{id}", name="classroom_home")
     * @Method({"GET","POST"})
     */
    public function homeAction(Request $request,Classroom $classroom)
    {
        $em = $this->getDoctrine()->getManager();
        $this->validateUserClassroom($classroom);
        $session = $em->getRepository('CoreBundle:Session')->findOneBy(array('finished_at' => null));

        $sessionform = $this->createFormBuilder()
            ->setAction($this->generateUrl('classroom_home', array('id' => $classroom->getId())))
            ->setMethod('POST')
            ->add('classroom_id', HiddenType::class, array(
                'data' => $classroom->getId()
              ))
            ->getForm()
        ;

        $sessionform->handleRequest($request);

        if ($sessionform->isSubmitted() && $sessionform->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $session = new Session();
            $data = $sessionform->getData();
            $session->setClassroom($classroom);
            $session->setCreatedAt(new \DateTime("now"));
            $em->persist($session);
            $em->flush();

            //GO TO SESSION HOME PAGE
            return $this->redirectToRoute('active_index', array('id' => $session->getId()));
        }

        return $this->render('classroom/classroom.html.twig', array(
            'sessionform' => $sessionform->createView(),
            'session' => $session,
            'classroom' => $classroom,
        ));
    }

    /**
     * Finds and displays a Classroom entity.
     *
     * @Route("/home/sessions/{id}", name="classroom_sessions")
     * @Method({"GET","POST"})
     */
    public function sessionsAction(Request $request,Classroom $classroom)
    {
        $em = $this->getDoctrine()->getManager();
        $this->validateUserClassroom($classroom);
        $sessions = $em->getRepository('CoreBundle:Session')->findBy(array('classroom_id' => $classroom->getId()));

        return $this->render('session/sessions.html.twig', array(
            'sessions' => $sessions,
            'classroom' => $classroom,
        ));
    }




    /**
     * Displays a form to edit an existing Classroom entity.
     *
     * @Route("/{id}/edit", name="classroom_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Classroom $classroom)
    {
        $deleteForm = $this->createDeleteForm($classroom);
        $editForm = $this->createForm('CoreBundle\Form\ClassroomType', $classroom);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $classroom->setLastchange(new \DateTime("now"));
            $em->persist($classroom);
            $em->flush();

            return $this->redirectToRoute('classroom_edit', array('id' => $classroom->getId()));
        }

        return $this->render('classroom/edit.html.twig', array(
            'classroom' => $classroom,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Classroom entity.
     *
     * @Route("/{id}", name="classroom_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Classroom $classroom)
    {
        $form = $this->createDeleteForm($classroom);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($classroom);
            $em->flush();
        }

        return $this->redirectToRoute('classroom_index');
    }

    /**
     * Creates a form to delete a Classroom entity.
     *
     * @param Classroom $classroom The Classroom entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Classroom $classroom)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('classroom_delete', array('id' => $classroom->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Validation of User
     *
     */
     private function validateUserClassroom($classroom){
          if ( $this->getUser()->getId() != $classroom->getUserId() ){
              throw $this->createNotFoundException('La Sala seleccionada pertenece a otro usuario');
          }
     }

}
