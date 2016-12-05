<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\ResultUser
 *
 * @ORM\Entity()
 * @ORM\Table(name="result_user", indexes={@ORM\Index(name="fk_result_question1_idx", columns={"question_id"}), @ORM\Index(name="fk_result_user1_idx", columns={"user_id"}), @ORM\Index(name="fk_result_user_option1_idx", columns={"option_id"})})
 */
class ResultUser
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
     * @ORM\Column(type="integer")
     */
    protected $question_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $user_id;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $iscorrect;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $activity_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $option_id;

    // /**
    //  * @ORM\ManyToOne(targetEntity="Question", inversedBy="resultUsers")
    //  * @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=false)
    //  */
    // protected $question;
    //
    // /**
    //  * @ORM\ManyToOne(targetEntity="User", inversedBy="resultUsers")
    //  * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
    //  */
    // protected $user;
    //
    // /**
    //  * @ORM\ManyToOne(targetEntity="Option", inversedBy="resultUsers")
    //  * @ORM\JoinColumn(name="option_id", referencedColumnName="id", nullable=false)
    //  */
    // protected $option;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\ResultUser
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
     * @return \CoreBundle\Entity\ResultUser
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
     * @return \CoreBundle\Entity\ResultUser
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
     * Set the value of question_id.
     *
     * @param integer $question_id
     * @return \CoreBundle\Entity\ResultUser
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
     * Set the value of user_id.
     *
     * @param integer $user_id
     * @return \CoreBundle\Entity\ResultUser
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
     * Set the value of iscorrect.
     *
     * @param boolean $iscorrect
     * @return \CoreBundle\Entity\ResultUser
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
     * Set the value of activity_id.
     *
     * @param integer $activity_id
     * @return \CoreBundle\Entity\ResultUser
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
     * Set the value of option_id.
     *
     * @param integer $option_id
     * @return \CoreBundle\Entity\ResultUser
     */
    public function setOptionId($option_id)
    {
        $this->option_id = $option_id;

        return $this;
    }

    /**
     * Get the value of option_id.
     *
     * @return integer
     */
    public function getOptionId()
    {
        return $this->option_id;
    }

    /**
     * Set Question entity (many to one).
     *
     * @param \CoreBundle\Entity\Question $question
     * @return \CoreBundle\Entity\ResultUser
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

    /**
     * Set User entity (many to one).
     *
     * @param \CoreBundle\Entity\User $user
     * @return \CoreBundle\Entity\ResultUser
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

    /**
     * Set Option entity (many to one).
     *
     * @param \CoreBundle\Entity\Option $option
     * @return \CoreBundle\Entity\ResultUser
     */
    public function setOption(Option $option = null)
    {
        $this->option = $option;

        return $this;
    }

    /**
     * Get Option entity (many to one).
     *
     * @return \CoreBundle\Entity\Option
     */
    public function getOption()
    {
        return $this->option;
    }

    public function __sleep()
    {
        return array('id', 'created_at', 'updated_at', 'question_id', 'user_id', 'iscorrect', 'activity_id', 'option_id');
    }
}
