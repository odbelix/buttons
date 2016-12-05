<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\Classroom
 *
 * @ORM\Entity()
 * @ORM\Table(name="classroom", indexes={@ORM\Index(name="fk_classroom_user1_idx", columns={"user_id"})})
 */
class Classroom
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $code;

    /**
     * @ORM\Column(name="`name`", type="string", length=200)
     */
    protected $name;

    /**
     * @ORM\Column(type="date")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $lastchange;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $user_id;

    /**
     * @ORM\OneToMany(targetEntity="ClassroomActivity", mappedBy="classroom")
     * @ORM\JoinColumn(name="id", referencedColumnName="classroom_id", nullable=false)
     */
    protected $classroomActivities;

    /**
     * @ORM\OneToMany(targetEntity="ClassroomReport", mappedBy="classroom")
     * @ORM\JoinColumn(name="id", referencedColumnName="classroom_id", nullable=false)
     */
    protected $classroomReports;

    /**
     * @ORM\OneToMany(targetEntity="Enrollment", mappedBy="classroom")
     * @ORM\JoinColumn(name="id", referencedColumnName="classroom_id", nullable=false)
     */
    protected $enrollments;

    /**
     * @ORM\OneToMany(targetEntity="Group", mappedBy="classroom")
     * @ORM\JoinColumn(name="id", referencedColumnName="classroom_id", nullable=false)
     */
    protected $groups;

    /**
     * @ORM\OneToMany(targetEntity="Session", mappedBy="classroom")
     * @ORM\JoinColumn(name="id", referencedColumnName="classroom_id", nullable=false)
     */
    protected $sessions;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="classrooms")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    public function __construct()
    {
        $this->classroomActivities = new ArrayCollection();
        $this->classroomReports = new ArrayCollection();
        $this->enrollments = new ArrayCollection();
        $this->groups = new ArrayCollection();
        $this->sessions = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Classroom
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
     * Set the value of code.
     *
     * @param string $code
     * @return \CoreBundle\Entity\Classroom
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \CoreBundle\Entity\Classroom
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\Classroom
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
     * Set the value of lastchange.
     *
     * @param \DateTime $lastchange
     * @return \CoreBundle\Entity\Classroom
     */
    public function setLastchange($lastchange)
    {
        $this->lastchange = $lastchange;

        return $this;
    }

    /**
     * Get the value of lastchange.
     *
     * @return \DateTime
     */
    public function getLastchange()
    {
        return $this->lastchange;
    }

    /**
     * Set the value of user_id.
     *
     * @param integer $user_id
     * @return \CoreBundle\Entity\Classroom
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of user_id.
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Add ClassroomActivity entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ClassroomActivity $classroomActivity
     * @return \CoreBundle\Entity\Classroom
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
     * @return \CoreBundle\Entity\Classroom
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
     * Add ClassroomReport entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ClassroomReport $classroomReport
     * @return \CoreBundle\Entity\Classroom
     */
    public function addClassroomReport(ClassroomReport $classroomReport)
    {
        $this->classroomReports[] = $classroomReport;

        return $this;
    }

    /**
     * Remove ClassroomReport entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\ClassroomReport $classroomReport
     * @return \CoreBundle\Entity\Classroom
     */
    public function removeClassroomReport(ClassroomReport $classroomReport)
    {
        $this->classroomReports->removeElement($classroomReport);

        return $this;
    }

    /**
     * Get ClassroomReport entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassroomReports()
    {
        return $this->classroomReports;
    }

    /**
     * Add Enrollment entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Enrollment $enrollment
     * @return \CoreBundle\Entity\Classroom
     */
    public function addEnrollment(Enrollment $enrollment)
    {
        $this->enrollments[] = $enrollment;

        return $this;
    }

    /**
     * Remove Enrollment entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Enrollment $enrollment
     * @return \CoreBundle\Entity\Classroom
     */
    public function removeEnrollment(Enrollment $enrollment)
    {
        $this->enrollments->removeElement($enrollment);

        return $this;
    }

    /**
     * Get Enrollment entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnrollments()
    {
        return $this->enrollments;
    }

    /**
     * Add Group entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Group $group
     * @return \CoreBundle\Entity\Classroom
     */
    public function addGroup(Group $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Remove Group entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Group $group
     * @return \CoreBundle\Entity\Classroom
     */
    public function removeGroup(Group $group)
    {
        $this->groups->removeElement($group);

        return $this;
    }

    /**
     * Get Group entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Add Session entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Session $session
     * @return \CoreBundle\Entity\Classroom
     */
    public function addSession(Session $session)
    {
        $this->sessions[] = $session;

        return $this;
    }

    /**
     * Remove Session entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Session $session
     * @return \CoreBundle\Entity\Classroom
     */
    public function removeSession(Session $session)
    {
        $this->sessions->removeElement($session);

        return $this;
    }

    /**
     * Get Session entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * Set User entity (many to one).
     *
     * @param \CoreBundle\Entity\User $user
     * @return \CoreBundle\Entity\Classroom
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get User entity (many to one).
     *
     * @return \CoreBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __sleep()
    {
        return array('id', 'code', 'name', 'created_at', 'lastchange', 'user_id');
    }
}