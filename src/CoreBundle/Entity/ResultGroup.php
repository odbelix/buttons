<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\ResultGroup
 *
 * @ORM\Entity()
 * @ORM\Table(name="result_group", indexes={@ORM\Index(name="fk_result_group_group1_idx", columns={"group_id"}), @ORM\Index(name="fk_result_group_question1_idx", columns={"question_id"})})
 */
class ResultGroup
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="date")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $updated_at;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $iscorrect;

    /**
     * @ORM\Column(type="integer")
     */
    protected $group_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $activity_id;

    /**
     * @ORM\ManyToOne(targetEntity="Group", inversedBy="resultGroups")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=false)
     */
    protected $group;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="resultGroups")
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
     * @return \CoreBundle\Entity\ResultGroup
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
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\ResultGroup
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
     * Set the value of updated_at.
     *
     * @param \DateTime $updated_at
     * @return \CoreBundle\Entity\ResultGroup
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of updated_at.
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of iscorrect.
     *
     * @param boolean $iscorrect
     * @return \CoreBundle\Entity\ResultGroup
     */
    public function setIscorrect($iscorrect)
    {
        $this->iscorrect = $iscorrect;

        return $this;
    }

    /**
     * Get the value of iscorrect.
     *
     * @return boolean
     */
    public function getIscorrect()
    {
        return $this->iscorrect;
    }

    /**
     * Set the value of group_id.
     *
     * @param integer $group_id
     * @return \CoreBundle\Entity\ResultGroup
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
     * Set the value of question_id.
     *
     * @param integer $question_id
     * @return \CoreBundle\Entity\ResultGroup
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
     * Set the value of activity_id.
     *
     * @param integer $activity_id
     * @return \CoreBundle\Entity\ResultGroup
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
     * Set Group entity (many to one).
     *
     * @param \CoreBundle\Entity\Group $group
     * @return \CoreBundle\Entity\ResultGroup
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
     * Set Question entity (many to one).
     *
     * @param \CoreBundle\Entity\Question $question
     * @return \CoreBundle\Entity\ResultGroup
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
        return array('id', 'created_at', 'updated_at', 'iscorrect', 'group_id', 'question_id', 'activity_id');
    }
}