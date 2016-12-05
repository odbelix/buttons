<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\Group
 *
 * @ORM\Entity()
 * @ORM\Table(name="`group`", indexes={@ORM\Index(name="fk_group_classroom1_idx", columns={"classroom_id"})})
 */
class Group
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
    protected $finished_at;

    /**
     * @ORM\Column(type="integer")
     */
    protected $classroom_id;

    /**
     * @ORM\OneToMany(targetEntity="GroupMember", mappedBy="group")
     * @ORM\JoinColumn(name="id", referencedColumnName="group_id", nullable=false)
     */
    protected $groupMembers;

    /**
     * @ORM\OneToMany(targetEntity="ResultGroup", mappedBy="group")
     * @ORM\JoinColumn(name="id", referencedColumnName="group_id", nullable=false)
     */
    protected $resultGroups;

    /**
     * @ORM\ManyToOne(targetEntity="Classroom", inversedBy="groups")
     * @ORM\JoinColumn(name="classroom_id", referencedColumnName="id", nullable=false)
     */
    protected $classroom;

    public function __construct()
    {
        $this->groupMembers = new ArrayCollection();
        $this->resultGroups = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Group
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
     * Set the value of name.
     *
     * @param string $name
     * @return \CoreBundle\Entity\Group
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
     * @return \CoreBundle\Entity\Group
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
     * @return \CoreBundle\Entity\Group
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
     * @return \CoreBundle\Entity\Group
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
     * Add GroupMember entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\GroupMember $groupMember
     * @return \CoreBundle\Entity\Group
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
     * @return \CoreBundle\Entity\Group
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
     * Add ResultGroup entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ResultGroup $resultGroup
     * @return \CoreBundle\Entity\Group
     */
    public function addResultGroup(ResultGroup $resultGroup)
    {
        $this->resultGroups[] = $resultGroup;

        return $this;
    }

    /**
     * Remove ResultGroup entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\ResultGroup $resultGroup
     * @return \CoreBundle\Entity\Group
     */
    public function removeResultGroup(ResultGroup $resultGroup)
    {
        $this->resultGroups->removeElement($resultGroup);

        return $this;
    }

    /**
     * Get ResultGroup entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResultGroups()
    {
        return $this->resultGroups;
    }

    /**
     * Set Classroom entity (many to one).
     *
     * @param \CoreBundle\Entity\Classroom $classroom
     * @return \CoreBundle\Entity\Group
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
        return array('id', 'name', 'created_at', 'finished_at', 'classroom_id');
    }
}