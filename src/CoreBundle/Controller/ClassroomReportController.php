<?php

namespace CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\ClassroomReport;
use CoreBundle\Form\ClassroomReportType;

/**
 * ClassroomReport controller.
 *
 * @Route("/classroomreport")
 */
class ClassroomReportController extends Controller
{
    /**
     * Lists all ClassroomReport entities.
     *
     * @Route("/", name="classroomreport_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $classroomReports = $em->getRepository('CoreBundle:ClassroomReport')->findAll();

        return $this->render('classroomreport/index.html.twig', array(
            'classroomReports' => $classroomReports,
        ));
    }

    /**
     * Creates a new ClassroomReport entity.
     *
     * @Route("/new", name="classroomreport_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $classroomReport = new ClassroomReport();
        $form = $this->createForm('CoreBundle\Form\ClassroomReportType', $classroomReport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($classroomReport);
            $em->flush();

            return $this->redirectToRoute('classroomreport_show', array('id' => $classroomReport->getId()));
        }

        return $this->render('classroomreport/new.html.twig', array(
            'classroomReport' => $classroomReport,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ClassroomReport entity.
     *
     * @Route("/{id}", name="classroomreport_show")
     * @Method("GET")
     */
    public function showAction(ClassroomReport $classroomReport)
    {
        $deleteForm = $this->createDeleteForm($classroomReport);

        return $this->render('classroomreport/show.html.twig', array(
            'classroomReport' => $classroomReport,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ClassroomReport entity.
     *
     * @Route("/{id}/edit", name="classroomreport_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ClassroomReport $classroomReport)
    {
        $deleteForm = $this->createDeleteForm($classroomReport);
        $editForm = $this->createForm('CoreBundle\Form\ClassroomReportType', $classroomReport);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($classroomReport);
            $em->flush();

            return $this->redirectToRoute('classroomreport_edit', array('id' => $classroomReport->getId()));
        }

        return $this->render('classroomreport/edit.html.twig', array(
            'classroomReport' => $classroomReport,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ClassroomReport entity.
     *
     * @Route("/{id}", name="classroomreport_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ClassroomReport $classroomReport)
    {
        $form = $this->createDeleteForm($classroomReport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($classroomReport);
            $em->flush();
        }

        return $this->redirectToRoute('classroomreport_index');
    }

    /**
     * Creates a form to delete a ClassroomReport entity.
     *
     * @param ClassroomReport $classroomReport The ClassroomReport entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ClassroomReport $classroomReport)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('classroomreport_delete', array('id' => $classroomReport->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
