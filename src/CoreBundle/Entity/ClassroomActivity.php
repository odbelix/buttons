<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\ClassroomActivity
 *
 * @ORM\Entity()
 * @ORM\Table(name="classroom_activity", indexes={@ORM\Index(name="fk_classroom_activity_activity1_idx", columns={"activity_id"}), @ORM\Index(name="fk_classroom_activity_classroom1_idx", columns={"classroom_id"}), @ORM\Index(name="fk_classroom_activity_session1_idx", columns={"session_id"})})
 */
class ClassroomActivity
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
    protected $activity_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $classroom_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $session_id;

    /**
     * @ORM\ManyToOne(targetEntity="Activity", inversedBy="classroomActivities")
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id", nullable=false)
     */
    protected $activity;

    /**
     * @ORM\ManyToOne(targetEntity="Classroom", inversedBy="classroomActivities")
     * @ORM\JoinColumn(name="classroom_id", referencedColumnName="id", nullable=false)
     */
    protected $classroom;

    /**
     * @ORM\ManyToOne(targetEntity="Session", inversedBy="classroomActivities")
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
     * @return \CoreBundle\Entity\ClassroomActivity
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
     * @return \CoreBundle\Entity\ClassroomActivity
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
     * Set the value of activity_id.
     *
     * @param integer $activity_id
     * @return \CoreBundle\Entity\ClassroomActivity
     */
    public function setActivityId($activity_id)
    {
        $this->activity_id = $activity_id;

        return $this;
    }

    /**
     * Get the value of activity_id.
     *
     * @return integer
     */
    public function getActivityId()
    {
        return $this->activity_id;
    }

    /**
     * Set the value of classroom_id.
     *
     * @param integer $classroom_id
     * @return \CoreBundle\Entity\ClassroomActivity
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
     * @return \CoreBundle\Entity\ClassroomActivity
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
     * Set Activity entity (many to one).
     *
     * @param \CoreBundle\Entity\Activity $activity
     * @return \CoreBundle\Entity\ClassroomActivity
     */
    public function setActivity(Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get Activity entity (many to one).
     *
     * @return \CoreBundle\Entity\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set Classroom entity (many to one).
     *
     * @param \CoreBundle\Entity\Classroom $classroom
     * @return \CoreBundle\Entity\ClassroomActivity
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
     * @return \CoreBundle\Entity\ClassroomActivity
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
        return array('id', 'created_at', 'activity_id', 'classroom_id', 'session_id');
    }
}