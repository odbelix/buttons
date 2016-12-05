<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\SubscriptionType
 *
 * @ORM\Entity()
 * @ORM\Table(name="subscription_type")
 */
class SubscriptionType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=45)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $charge;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $lastchange;

    /**
     * @ORM\OneToMany(targetEntity="Subscription", mappedBy="subscriptionType")
     * @ORM\JoinColumn(name="id", referencedColumnName="subscription_type_id", nullable=false)
     */
    protected $subscriptions;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\SubscriptionType
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
     * @return \CoreBundle\Entity\SubscriptionType
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
     * Set the value of charge.
     *
     * @param string $charge
     * @return \CoreBundle\Entity\SubscriptionType
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;

        return $this;
    }

    /**
     * Get the value of charge.
     *
     * @return string
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\SubscriptionType
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
     * @return \CoreBundle\Entity\SubscriptionType
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
     * Add Subscription entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Subscription $subscription
     * @return \CoreBundle\Entity\SubscriptionType
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
     * @return \CoreBundle\Entity\SubscriptionType
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
        return array('id', 'name', 'charge', 'created_at', 'lastchange');
    }
}