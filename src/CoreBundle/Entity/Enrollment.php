<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\Enrollment
 *
 * @ORM\Entity()
 * @ORM\Table(name="enrollment", indexes={@ORM\Index(name="fk_enrollment_classroom1_idx", columns={"classroom_id"}), @ORM\Index(name="fk_enrollment_user1_idx", columns={"user_id"})})
 */
class Enrollment
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $classroom_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $user_id;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $available;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $enrollment_at;

    /**
     * @ORM\ManyToOne(targetEntity="Classroom", inversedBy="enrollments")
     * @ORM\JoinColumn(name="classroom_id", referencedColumnName="id", nullable=false)
     */
    protected $classroom;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="enrollments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $user;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Enrollment
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
     * Set the value of classroom_id.
     *
     * @param integer $classroom_id
     * @return \CoreBundle\Entity\Enrollment
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
     * Set the value of user_id.
     *
     * @param integer $user_id
     * @return \CoreBundle\Entity\Enrollment
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
     * Set the value of available.
     *
     * @param boolean $available
     * @return \CoreBundle\Entity\Enrollment
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * Get the value of available.
     *
     * @return boolean
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * Set the value of enrollment_at.
     *
     * @param \DateTime $enrollment_at
     * @return \CoreBundle\Entity\Enrollment
     */
    public function setEnrollmentAt($enrollment_at)
    {
        $this->enrollment_at = $enrollment_at;

        return $this;
    }

    /**
     * Get the value of enrollment_at.
     *
     * @return \DateTime
     */
    public function getEnrollmentAt()
    {
        return $this->enrollment_at;
    }

    /**
     * Set Classroom entity (many to one).
     *
     * @param \CoreBundle\Entity\Classroom $classroom
     * @return \CoreBundle\Entity\Enrollment
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
     * Set User entity (many to one).
     *
     * @param \CoreBundle\Entity\User $user
     * @return \CoreBundle\Entity\Enrollment
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
        return array('id', 'classroom_id', 'user_id', 'available', 'enrollment_at');
    }
}