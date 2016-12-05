<?php

namespace CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\QuestionType;
use CoreBundle\Form\QuestionTypeType;

/**
 * QuestionType controller.
 *
 * @Route("/config/questiontype")
 */
class QuestionTypeController extends Controller
{
    /**
     * Lists all QuestionType entities.
     *
     * @Route("/", name="config_questiontype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $questionTypes = $em->getRepository('CoreBundle:QuestionType')->findAll();

        return $this->render('questiontype/index.html.twig', array(
            'questionTypes' => $questionTypes,
        ));
    }

    /**
     * Creates a new QuestionType entity.
     *
     * @Route("/new", name="config_questiontype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $questionType = new QuestionType();
        $form = $this->createForm('CoreBundle\Form\QuestionTypeType', $questionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $questionType->setCreatedAt(new \DateTime("now"));
            $em->persist($questionType);
            $em->flush();

            return $this->redirectToRoute('config_questiontype_show', array('id' => $questionType->getId()));
        }

        return $this->render('questiontype/new.html.twig', array(
            'questionType' => $questionType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a QuestionType entity.
     *
     * @Route("/{id}", name="config_questiontype_show")
     * @Method("GET")
     */
    public function showAction(QuestionType $questionType)
    {
        $deleteForm = $this->createDeleteForm($questionType);

        return $this->render('questiontype/show.html.twig', array(
            'questionType' => $questionType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing QuestionType entity.
     *
     * @Route("/{id}/edit", name="config_questiontype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, QuestionType $questionType)
    {
        $deleteForm = $this->createDeleteForm($questionType);
        $editForm = $this->createForm('CoreBundle\Form\QuestionTypeType', $questionType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($questionType);
            $em->flush();

            return $this->redirectToRoute('config_questiontype_edit', array('id' => $questionType->getId()));
        }

        return $this->render('questiontype/edit.html.twig', array(
            'questionType' => $questionType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a QuestionType entity.
     *
     * @Route("/{id}", name="config_questiontype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, QuestionType $questionType)
    {
        $form = $this->createDeleteForm($questionType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($questionType);
            $em->flush();
        }

        return $this->redirectToRoute('config_questiontype_index');
    }

    /**
     * Creates a form to delete a QuestionType entity.
     *
     * @param QuestionType $questionType The QuestionType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(QuestionType $questionType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('config_questiontype_delete', array('id' => $questionType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
