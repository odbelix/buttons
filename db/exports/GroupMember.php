<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\GroupMember
 *
 * @ORM\Entity()
 * @ORM\Table(name="group_member", indexes={@ORM\Index(name="fk_group_member_group1_idx", columns={"group_id"}), @ORM\Index(name="fk_group_member_user1_idx", columns={"user_id"})})
 */
class GroupMember
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
    protected $group_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="groupMembers")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=false)
     */
    protected $group;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="groupMembers")
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
     * @return \CoreBundle\Entity\GroupMember
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
     * Set the value of group_id.
     *
     * @param integer $group_id
     * @return \CoreBundle\Entity\GroupMember
     */
    public function setGroupId($group_id)
    {
        $this->group_id = $group_id;

        return $this;
    }

    /**
     * Get the value of group_id.
     *
     * @return integer
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Set the value of user_id.
     *
     * @param integer $user_id
     * @return \CoreBundle\Entity\GroupMember
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
     * Set Group entity (many to one).
     *
     * @param \CoreBundle\Entity\Group $group
     * @return \CoreBundle\Entity\GroupMember
     */
    public function setGroup(Group $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get Group entity (many to one).
     *
     * @return \CoreBundle\Entity\Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set User entity (many to one).
     *
     * @param \CoreBundle\Entity\User $user
     * @return \CoreBundle\Entity\GroupMember
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
        return array('id', 'group_id', 'user_id');
    }
}