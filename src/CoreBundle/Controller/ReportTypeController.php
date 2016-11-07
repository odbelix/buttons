<?php

namespace CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\ReportType;
use CoreBundle\Form\ReportTypeType;

/**
 * ReportType controller.
 *
 * @Route("/config/reporttype")
 */
class ReportTypeController extends Controller
{
    /**
     * Lists all ReportType entities.
     *
     * @Route("/", name="config_reporttype_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reportTypes = $em->getRepository('CoreBundle:ReportType')->findAll();

        return $this->render('reporttype/index.html.twig', array(
            'reportTypes' => $reportTypes,
        ));
    }

    /**
     * Creates a new ReportType entity.
     *
     * @Route("/new", name="config_reporttype_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reportType = new ReportType();
        $form = $this->createForm('CoreBundle\Form\ReportTypeType', $reportType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reportType);
            $em->flush();

            return $this->redirectToRoute('config_reporttype_show', array('id' => $reportType->getId()));
        }

        return $this->render('reporttype/new.html.twig', array(
            'reportType' => $reportType,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ReportType entity.
     *
     * @Route("/{id}", name="config_reporttype_show")
     * @Method("GET")
     */
    public function showAction(ReportType $reportType)
    {
        $deleteForm = $this->createDeleteForm($reportType);

        return $this->render('reporttype/show.html.twig', array(
            'reportType' => $reportType,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ReportType entity.
     *
     * @Route("/{id}/edit", name="config_reporttype_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ReportType $reportType)
    {
        $deleteForm = $this->createDeleteForm($reportType);
        $editForm = $this->createForm('CoreBundle\Form\ReportTypeType', $reportType);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reportType);
            $em->flush();

            return $this->redirectToRoute('config_reporttype_edit', array('id' => $reportType->getId()));
        }

        return $this->render('reporttype/edit.html.twig', array(
            'reportType' => $reportType,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ReportType entity.
     *
     * @Route("/{id}", name="config_reporttype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ReportType $reportType)
    {
        $form = $this->createDeleteForm($reportType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reportType);
            $em->flush();
        }

        return $this->redirectToRoute('config_reporttype_index');
    }

    /**
     * Creates a form to delete a ReportType entity.
     *
     * @param ReportType $reportType The ReportType entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ReportType $reportType)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('config_reporttype_delete', array('id' => $reportType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
