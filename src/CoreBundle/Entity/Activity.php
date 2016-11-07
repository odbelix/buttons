<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\Activity
 *
 * @ORM\Entity()
 * @ORM\Table(name="activity", indexes={@ORM\Index(name="fk_activity_activity_type1_idx", columns={"activity_type_id"})})
 */
class Activity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=500)
     */
    protected $name;

    /**
     * @ORM\Column(type="date")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $created_by;

    /**
     * @ORM\Column(type="integer")
     */
    protected $activity_type_id;

    /**
     * @ORM\OneToMany(targetEntity="ActivityQuestion", mappedBy="activity")
     * @ORM\JoinColumn(name="id", referencedColumnName="activity_id", nullable=false)
     */
    protected $activityQuestions;

    /**
     * @ORM\OneToMany(targetEntity="ClassroomActivity", mappedBy="activity")
     * @ORM\JoinColumn(name="id", referencedColumnName="activity_id", nullable=false)
     */
    protected $classroomActivities;

    /**
     * @ORM\ManyToOne(targetEntity="ActivityType", inversedBy="activities")
     * @ORM\JoinColumn(name="activity_type_id", referencedColumnName="id", nullable=false)
     */
    protected $activityType;

    public function __construct()
    {
        $this->activityQuestions = new ArrayCollection();
        $this->classroomActivities = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Activity
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
     * @return \CoreBundle\Entity\Activity
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
     * @return \CoreBundle\Entity\Activity
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
     * Set the value of created_by.
     *
     * @param \DateTime $created_by
     * @return \CoreBundle\Entity\Activity
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;

        return $this;
    }

    /**
     * Get the value of created_by.
     *
     * @return \DateTime
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set the value of activity_type_id.
     *
     * @param integer $activity_type_id
     * @return \CoreBundle\Entity\Activity
     */
    public function setActivityTypeId($activity_type_id)
    {
        $this->activity_type_id = $activity_type_id;

        return $this;
    }

    /**
     * Get the value of activity_type_id.
     *
     * @return integer
     */
    public function getActivityTypeId()
    {
        return $this->activity_type_id;
    }

    /**
     * Add ActivityQuestion entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ActivityQuestion $activityQuestion
     * @return \CoreBundle\Entity\Activity
     */
    public function addActivityQuestion(ActivityQuestion $activityQuestion)
    {
        $this->activityQuestions[] = $activityQuestion;

        return $this;
    }

    /**
     * Remove ActivityQuestion entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\ActivityQuestion $activityQuestion
     * @return \CoreBundle\Entity\Activity
     */
    public function removeActivityQuestion(ActivityQuestion $activityQuestion)
    {
        $this->activityQuestions->removeElement($activityQuestion);

        return $this;
    }

    /**
     * Get ActivityQuestion entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivityQuestions()
    {
        return $this->activityQuestions;
    }

    /**
     * Add ClassroomActivity entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ClassroomActivity $classroomActivity
     * @return \CoreBundle\Entity\Activity
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
     * @return \CoreBundle\Entity\Activity
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
     * Set ActivityType entity (many to one).
     *
     * @param \CoreBundle\Entity\ActivityType $activityType
     * @return \CoreBundle\Entity\Activity
     */
    public function setActivityType(ActivityType $activityType = null)
    {
        $this->activityType = $activityType;

        return $this;
    }

    /**
     * Get ActivityType entity (many to one).
     *
     * @return \CoreBundle\Entity\ActivityType
     */
    public function getActivityType()
    {
        return $this->activityType;
    }

    public function __sleep()
    {
        return array('id', 'name', 'created_at', 'created_by', 'activity_type_id');
    }
}