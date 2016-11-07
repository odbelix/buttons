<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\ClassroomQuestion
 *
 * @ORM\Entity()
 * @ORM\Table(name="classroom_question", indexes={@ORM\Index(name="fk_classroom_question_question1_idx", columns={"question_id"}), @ORM\Index(name="fk_classroom_question_classroom1_idx", columns={"classroom_id"}), @ORM\Index(name="fk_classroom_question_session1_idx", columns={"session_id"})})
 */
class ClassroomQuestion
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $created_at;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $classroom_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $session_id;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="classroomQuestions")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=false)
     */
    protected $question;

    /**
     * @ORM\ManyToOne(targetEntity="Classroom", inversedBy="classroomQuestions")
     * @ORM\JoinColumn(name="classroom_id", referencedColumnName="id", nullable=false)
     */
    protected $classroom;

    /**
     * @ORM\ManyToOne(targetEntity="Session", inversedBy="classroomQuestions")
     * @ORM\JoinColumn(name="session_id", referencedColumnName="id", nullable=false)
     */
    protected $session;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\ClassroomQuestion
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\ClassroomQuestion
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of created_at.
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of question_id.
     *
     * @param integer $question_id
     * @return \CoreBundle\Entity\ClassroomQuestion
     */
    public function setQuestionId($question_id)
    {
        $this->question_id = $question_id;

        return $this;
    }

    /**
     * Get the value of question_id.
     *
     * @return integer
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * Set the value of classroom_id.
     *
     * @param integer $classroom_id
     * @return \CoreBundle\Entity\ClassroomQuestion
     */
    public function setClassroomId($classroom_id)
    {
        $this->classroom_id = $classroom_id;

        return $this;
    }

    /**
     * Get the value of classroom_id.
     *
     * @return integer
     */
    public function getClassroomId()
    {
        return $this->classroom_id;
    }

    /**
     * Set the value of session_id.
     *
     * @param integer $session_id
     * @return \CoreBundle\Entity\ClassroomQuestion
     */
    public function setSessionId($session_id)
    {
        $this->session_id = $session_id;

        return $this;
    }

    /**
     * Get the value of session_id.
     *
     * @return integer
     */
    public function getSessionId()
    {
        return $this->session_id;
    }

    /**
     * Set Question entity (many to one).
     *
     * @param \CoreBundle\Entity\Question $question
     * @return \CoreBundle\Entity\ClassroomQuestion
     */
    public function setQuestion(Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get Question entity (many to one).
     *
     * @return \CoreBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set Classroom entity (many to one).
     *
     * @param \CoreBundle\Entity\Classroom $classroom
     * @return \CoreBundle\Entity\ClassroomQuestion
     */
    public function setClassroom(Classroom $classroom = null)
    {
        $this->classroom = $classroom;

        return $this;
    }

    /**
     * Get Classroom entity (many to one).
     *
     * @return \CoreBundle\Entity\Classroom
     */
    public function getClassroom()
    {
        return $this->classroom;
    }

    /**
     * Set Session entity (many to one).
     *
     * @param \CoreBundle\Entity\Session $session
     * @return \CoreBundle\Entity\ClassroomQuestion
     */
    public function setSession(Session $session = null)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get Session entity (many to one).
     *
     * @return \CoreBundle\Entity\Session
     */
    public function getSession()
    {
        return $this->session;
    }

    public function __sleep()
    {
        return array('id', 'created_at', 'question_id', 'classroom_id', 'session_id');
    }
}