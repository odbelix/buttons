<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\ActivityType
 *
 * @ORM\Entity()
 * @ORM\Table(name="activity_type")
 */
class ActivityType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $available;

    /**
     * @ORM\Column(name="`name`", type="string", length=500)
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $explanation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $race;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $quiz;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $poll;

    /**
     * @ORM\OneToMany(targetEntity="Activity", mappedBy="activityType")
     * @ORM\JoinColumn(name="id", referencedColumnName="activity_type_id", nullable=false)
     */
    protected $activities;

    public function __construct()
    {
        $this->activities = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\ActivityType
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
     * Set the value of available.
     *
     * @param boolean $available
     * @return \CoreBundle\Entity\ActivityType
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
     * Set the value of name.
     *
     * @param string $name
     * @return \CoreBundle\Entity\ActivityType
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
     * Set the value of explanation.
     *
     * @param string $explanation
     * @return \CoreBundle\Entity\ActivityType
     */
    public function setExplanation($explanation)
    {
        $this->explanation = $explanation;

        return $this;
    }

    /**
     * Get the value of explanation.
     *
     * @return string
     */
    public function getExplanation()
    {
        return $this->explanation;
    }

    /**
     * Set the value of race.
     *
     * @param boolean $race
     * @return \CoreBundle\Entity\ActivityType
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get the value of race.
     *
     * @return boolean
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set the value of quiz.
     *
     * @param boolean $quiz
     * @return \CoreBundle\Entity\ActivityType
     */
    public function setQuiz($quiz)
    {
        $this->quiz = $quiz;

        return $this;
    }

    /**
     * Get the value of quiz.
     *
     * @return boolean
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * Set the value of poll.
     *
     * @param boolean $poll
     * @return \CoreBundle\Entity\ActivityType
     */
    public function setPoll($poll)
    {
        $this->poll = $poll;

        return $this;
    }

    /**
     * Get the value of poll.
     *
     * @return boolean
     */
    public function getPoll()
    {
        return $this->poll;
    }

    /**
     * Add Activity entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Activity $activity
     * @return \CoreBundle\Entity\ActivityType
     */
    public function addActivity(Activity $activity)
    {
        $this->activities[] = $activity;

        return $this;
    }

    /**
     * Remove Activity entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Activity $activity
     * @return \CoreBundle\Entity\ActivityType
     */
    public function removeActivity(Activity $activity)
    {
        $this->activities->removeElement($activity);

        return $this;
    }

    /**
     * Get Activity entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivities()
    {
        return $this->activities;
    }

    public function __sleep()
    {
        return array('id', 'available', 'name', 'explanation', 'race', 'quiz', 'poll');
    }
}