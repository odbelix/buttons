<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\Session
 *
 * @ORM\Entity()
 * @ORM\Table(name="`session`", indexes={@ORM\Index(name="fk_session_classroom1_idx", columns={"classroom_id"})})
 */
class Session
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
     * @ORM\Column(type="date", nullable=true)
     */
    protected $finished_at;

    /**
     * @ORM\Column(type="integer")
     */
    protected $classroom_id;

    /**
     * @ORM\OneToMany(targetEntity="ClassroomActivity", mappedBy="session")
     * @ORM\JoinColumn(name="id", referencedColumnName="session_id", nullable=false)
     */
    protected $classroomActivities;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="session")
     * @ORM\JoinColumn(name="id", referencedColumnName="session_id", nullable=false)
     */
    protected $questions;

    /**
     * @ORM\ManyToOne(targetEntity="Classroom", inversedBy="sessions")
     * @ORM\JoinColumn(name="classroom_id", referencedColumnName="id", nullable=false)
     */
    protected $classroom;

    public function __construct()
    {
        $this->classroomActivities = new ArrayCollection();
        $this->questions = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Session
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
     * @return \CoreBundle\Entity\Session
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
     * Set the value of finished_at.
     *
     * @param \DateTime $finished_at
     * @return \CoreBundle\Entity\Session
     */
    public function setFinishedAt($finished_at)
    {
        $this->finished_at = $finished_at;

        return $this;
    }

    /**
     * Get the value of finished_at.
     *
     * @return \DateTime
     */
    public function getFinishedAt()
    {
        return $this->finished_at;
    }

    /**
     * Set the value of classroom_id.
     *
     * @param integer $classroom_id
     * @return \CoreBundle\Entity\Session
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
     * Add ClassroomActivity entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ClassroomActivity $classroomActivity
     * @return \CoreBundle\Entity\Session
     */
    public function addClassroomActivity(ClassroomActivity $classroomActivity)
    {
        $this->classroomActivities[] = $classroomActivity;

        return $this;
    }

    /**
     * Remove ClassroomActivity entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\ClassroomActivity $classroomActivity
     * @return \CoreBundle\Entity\Session
     */
    public function removeClassroomActivity(ClassroomActivity $classroomActivity)
    {
        $this->classroomActivities->removeElement($classroomActivity);

        return $this;
    }

    /**
     * Get ClassroomActivity entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassroomActivities()
    {
        return $this->classroomActivities;
    }

    /**
     * Add Question entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Question $question
     * @return \CoreBundle\Entity\Session
     */
    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove Question entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Question $question
     * @return \CoreBundle\Entity\Session
     */
    public function removeQuestion(Question $question)
    {
        $this->questions->removeElement($question);

        return $this;
    }

    /**
     * Get Question entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set Classroom entity (many to one).
     *
     * @param \CoreBundle\Entity\Classroom $classroom
     * @return \CoreBundle\Entity\Session
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

    public function __sleep()
    {
        return array('id', 'created_at', 'finished_at', 'classroom_id');
    }
}