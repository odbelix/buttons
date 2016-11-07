<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;

 /**
  * CoreBundle\Entity\User
  * @ORM\Entity
  * @ORM\Table(name="`user`")
  */
class User extends BaseUser
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
     * @ORM\OneToMany(targetEntity="GroupMember", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $groupMembers;

    /**
     * @ORM\OneToMany(targetEntity="ResultUser", mappedBy="user")
     * @ORM\JoinColumn(name="id", referencedColumnName="user_id", nullable=false)
     */
    protected $resultUsers;

    public function __construct()
    {
        parent::__construct();
        $this->classrooms = new ArrayCollection();
        $this->groupMembers = new ArrayCollection();
        $this->resultUsers = new ArrayCollection();
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

    public function __sleep()
    {
        return array('id', 'username', 'email');
    }
}