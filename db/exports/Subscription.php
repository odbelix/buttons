<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\Subscription
 *
 * @ORM\Entity()
 * @ORM\Table(name="subscription", indexes={@ORM\Index(name="fk_subscription_subscription_type1_idx", columns={"subscription_type_id"}), @ORM\Index(name="fk_subscription_user1_idx", columns={"user_id"})})
 */
class Subscription
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
    protected $subscription_type_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $user_id;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $available;

    /**
     * @ORM\ManyToOne(targetEntity="SubscriptionType", inversedBy="subscriptions")
     * @ORM\JoinColumn(name="subscription_type_id", referencedColumnName="id", nullable=false)
     */
    protected $subscriptionType;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="subscriptions")
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
     * @return \CoreBundle\Entity\Subscription
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
     * Set the value of subscription_type_id.
     *
     * @param integer $subscription_type_id
     * @return \CoreBundle\Entity\Subscription
     */
    public function setSubscriptionTypeId($subscription_type_id)
    {
        $this->subscription_type_id = $subscription_type_id;

        return $this;
    }

    /**
     * Get the value of subscription_type_id.
     *
     * @return integer
     */
    public function getSubscriptionTypeId()
    {
        return $this->subscription_type_id;
    }

    /**
     * Set the value of user_id.
     *
     * @param integer $user_id
     * @return \CoreBundle\Entity\Subscription
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
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\Subscription
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
     * Set the value of available.
     *
     * @param boolean $available
     * @return \CoreBundle\Entity\Subscription
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
     * Set SubscriptionType entity (many to one).
     *
     * @param \CoreBundle\Entity\SubscriptionType $subscriptionType
     * @return \CoreBundle\Entity\Subscription
     */
    public function setSubscriptionType(SubscriptionType $subscriptionType = null)
    {
        $this->subscriptionType = $subscriptionType;

        return $this;
    }

    /**
     * Get SubscriptionType entity (many to one).
     *
     * @return \CoreBundle\Entity\SubscriptionType
     */
    public function getSubscriptionType()
    {
        return $this->subscriptionType;
    }

    /**
     * Set User entity (many to one).
     *
     * @param \CoreBundle\Entity\User $user
     * @return \CoreBundle\Entity\Subscription
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
        return array('id', 'subscription_type_id', 'user_id', 'created_at', 'available');
    }
}