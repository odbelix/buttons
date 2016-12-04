<?php

namespace ApiBundle\Controller;

use CoreBundle\Entity\Session;
use CoreBundle\Entity\Question;
use CoreBundle\Entity\Classroom;
use CoreBundle\Entity\ResultUser;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
//REST
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
//For documentation path
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use UbiAppStatsBundle\Entity\ServiceStat;


class QuestionController extends Controller
{
  /**
    * Get list of courses
    * @Get("/classroom/{code}/question/get")
    * @ApiDoc(
    *  resource=true,
    *  description="Get active question of one course"
    * )
    */
    public function getAvailableQuestionAction($code)
    {
          $em = $this->getDoctrine()->getManager();
          $et = $this->getDoctrine()->getEntityManager();
          $classroom = $em->getRepository('CoreBundle:Classroom')->findOneBy(array('code' => $code));
          $session   = $em->getRepository('CoreBundle:Session')->findOneBy(array('classroom_id' => $classroom->getId(),'finished_at' =>  null));
          $query  = $em->createQuery("
                          SELECT q, o
                          FROM CoreBundle\Entity\Question q
                          JOIN q.options o
                          WHERE  q.session_id = :id
                          AND q.available = 1")
                    ->setParameter('id', $session->getId());
          try {
            return $query->getSingleResult();
          } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
          }
    }


    /**
      * POST An Answer
      * @POST("/answer/question/{question}/option/{option}/user/{user}/answer/{iscorrect}")
      * @ApiDoc(
      *  resource=true,
      *  description="Get list of topics by Unit",
      *  requirements={
      *      {"name"="question", "dataType"="int", "requirement"="true", "description"="Identify of Excercise"},
      *      {"name"="option", "dataType"="int", "requirement"="true", "description"="Identify of Option"},
      *      {"name"="user", "dataType"="int", "requirement"="true", "description"="Identify of User"},
      *      {"name"="iscorrect", "dataType"="int", "requirement"="true", "description"="Identify of User"},
      *  }
      * )
      */
    public function recordResultAction(Request $request,$question,$user,$option,$iscorrect) {
          $logger = $this->get('logger');

          //$data = $request->getContent();
          $data = $request->request->all();
          //$data = json_decode($request->getContent(), true);


          $em = $this->getDoctrine()->getManager();
          $jsonResponse = new JsonResponse();



          try {
          $nr = new ResultUser();
          $nr->setQuestionId($question);
          $nr->setOptionId($option);
          $nr->setUserId($user);
          $nr->setIscorrect($iscorrect);

          echo var_dump($nr);
          $nr->setCreatedAt(new \DateTime("now"));
          $em->persist($nr);
          $em->flush();

          $jsonResponse->setData(array(
                "type" => "success",
                "message"=>"ok"
            ));

          } catch(\Doctrine\ORM\ORMException $e){
                $jsonResponse->setData(array(
                    "type" => "error",
                    "message"=>"Error: Problem with Exerciseid/optionid"
                ));
          }

          return $jsonResponse;
    }
}
