<?php

namespace CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $classrooms = $em->getRepository('CoreBundle:Classroom')->findBy(array('user_id' => $this->getUser()->getId()));
        return $this->render('CoreBundle:Default:index.html.twig', array(
            'classrooms' => $classrooms,
        ));
    }
}
