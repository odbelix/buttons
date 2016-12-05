<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\ActivityQuestion
 *
 * @ORM\Entity()
 * @ORM\Table(name="activity_question", indexes={@ORM\Index(name="fk_activity_question_activity1_idx", columns={"activity_id"}), @ORM\Index(name="fk_activity_question_question1_idx", columns={"question_id"})})
 */
class ActivityQuestion
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
    protected $activity_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $created_at;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $created_by;

    /**
     * @ORM\ManyToOne(targetEntity="Activity", inversedBy="activityQuestions")
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id", nullable=false)
     */
    protected $activity;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="activityQuestions")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=false)
     */
    protected $question;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\ActivityQuestion
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
     * Set the value of activity_id.
     *
     * @param integer $activity_id
     * @return \CoreBundle\Entity\ActivityQuestion
     */
    public function setActivityId($activity_id)
    {
        $this->activity_id = $activity_id;

        return $this;
    }

    /**
     * Get the value of activity_id.
     *
     * @return integer
     */
    public function getActivityId()
    {
        return $this->activity_id;
    }

    /**
     * Set the value of question_id.
     *
     * @param integer $question_id
     * @return \CoreBundle\Entity\ActivityQuestion
     */
    public function setQuestionId($question_id)
    {
        $this->question_id = $question_id;

        return $this;
    }

    /**
     * Get the value of question_id.
     *
     * @return integer
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\ActivityQuestion
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
     * @param string $created_by
     * @return \CoreBundle\Entity\ActivityQuestion
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;

        return $this;
    }

    /**
     * Get the value of created_by.
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set Activity entity (many to one).
     *
     * @param \CoreBundle\Entity\Activity $activity
     * @return \CoreBundle\Entity\ActivityQuestion
     */
    public function setActivity(Activity $activity = null)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get Activity entity (many to one).
     *
     * @return \CoreBundle\Entity\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set Question entity (many to one).
     *
     * @param \CoreBundle\Entity\Question $question
     * @return \CoreBundle\Entity\ActivityQuestion
     */
    public function setQuestion(Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get Question entity (many to one).
     *
     * @return \CoreBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    public function __sleep()
    {
        return array('id', 'activity_id', 'question_id', 'created_at', 'created_by');
    }
}