<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\User
 *
 * @ORM\Entity()
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    protected $gender;

    /**
     * @ORM\OneToMany(targetEntity="Classroom", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $classrooms;

    /**
     * @ORM\OneToMany(targetEntity="Enrollment", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $enrollments;

    /**
     * @ORM\OneToMany(targetEntity="GroupMember", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $groupMembers;

    /**
     * @ORM\OneToMany(targetEntity="ResultUser", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $resultUsers;

    /**
     * @ORM\OneToMany(targetEntity="Subscription", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $subscriptions;

    public function __construct()
    {
        $this->classrooms = new ArrayCollection();
        $this->enrollments = new ArrayCollection();
        $this->groupMembers = new ArrayCollection();
        $this->resultUsers = new ArrayCollection();
        $this->subscriptions = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\User
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
     * Set the value of gender.
     *
     * @param string $gender
     * @return \CoreBundle\Entity\User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of gender.
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Add Classroom entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Classroom $classroom
     * @return \CoreBundle\Entity\User
     */
    public function addClassroom(Classroom $classroom)
    {
        $this->classrooms[] = $classroom;

        return $this;
    }

    /**
     * Remove Classroom entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Classroom $classroom
     * @return \CoreBundle\Entity\User
     */
    public function removeClassroom(Classroom $classroom)
    {
        $this->classrooms->removeElement($classroom);

        return $this;
    }

    /**
     * Get Classroom entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassrooms()
    {
        return $this->classrooms;
    }

    /**
     * Add Enrollment entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Enrollment $enrollment
     * @return \CoreBundle\Entity\User
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
     * @return \CoreBundle\Entity\User
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
     * Add GroupMember entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\GroupMember $groupMember
     * @return \CoreBundle\Entity\User
     */
    public function addGroupMember(GroupMember $groupMember)
    {
        $this->groupMembers[] = $groupMember;

        return $this;
    }

    /**
     * Remove GroupMember entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\GroupMember $groupMember
     * @return \CoreBundle\Entity\User
     */
    public function removeGroupMember(GroupMember $groupMember)
    {
        $this->groupMembers->removeElement($groupMember);

        return $this;
    }

    /**
     * Get GroupMember entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupMembers()
    {
        return $this->groupMembers;
    }

    /**
     * Add ResultUser entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ResultUser $resultUser
     * @return \CoreBundle\Entity\User
     */
    public function addResultUser(ResultUser $resultUser)
    {
        $this->resultUsers[] = $resultUser;

        return $this;
    }

    /**
     * Remove ResultUser entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\ResultUser $resultUser
     * @return \CoreBundle\Entity\User
     */
    public function removeResultUser(ResultUser $resultUser)
    {
        $this->resultUsers->removeElement($resultUser);

        return $this;
    }

    /**
     * Get ResultUser entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResultUsers()
    {
        return $this->resultUsers;
    }

    /**
     * Add Subscription entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Subscription $subscription
     * @return \CoreBundle\Entity\User
     */
    public function addSubscription(Subscription $subscription)
    {
        $this->subscriptions[] = $subscription;

        return $this;
    }

    /**
     * Remove Subscription entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Subscription $subscription
     * @return \CoreBundle\Entity\User
     */
    public function removeSubscription(Subscription $subscription)
    {
        $this->subscriptions->removeElement($subscription);

        return $this;
    }

    /**
     * Get Subscription entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    public function __sleep()
    {
        return array('id', 'gender');
    }
}