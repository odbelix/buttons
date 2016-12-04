<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\Question
 *
 * @ORM\Entity()
 * @ORM\Table(name="question", indexes={@ORM\Index(name="fk_question_question_type1_idx", columns={"question_type_id"}), @ORM\Index(name="fk_question_session1_idx", columns={"session_id"})})
 */
class Question
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
    protected $session_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_type_id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    protected $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $detail;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $suggestion;

    /**
     * @ORM\Column(type="date")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $showanswer;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $showresults;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $available;

    /**
     * @ORM\OneToMany(targetEntity="ActivityQuestion", mappedBy="question")
     * @ORM\JoinColumn(name="id", referencedColumnName="question_id", nullable=false)
     */
    protected $activityQuestions;

    /**
     * @ORM\OneToMany(targetEntity="Option", mappedBy="question",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="id", referencedColumnName="question_id", nullable=false)
     */
    protected $options;

    /**
     * @ORM\OneToMany(targetEntity="ResultGroup", mappedBy="question")
     * @ORM\JoinColumn(name="id", referencedColumnName="question_id", nullable=false)
     */
    protected $resultGroups;

    /**
     * @ORM\OneToMany(targetEntity="ResultUser", mappedBy="question")
     * @ORM\JoinColumn(name="id", referencedColumnName="question_id", nullable=false)
     */
    protected $resultUsers;

    // /**
    //  * @ORM\ManyToOne(targetEntity="Session", inversedBy="questions")
    //  * @ORM\JoinColumn(name="session_id", referencedColumnName="id", nullable=false)
    //  */
    // protected $session;

    // /**
    //  * @ORM\ManyToOne(targetEntity="QuestionType", inversedBy="questions")
    //  * @ORM\JoinColumn(name="question_type_id", referencedColumnName="id", nullable=false)
    //  */
    // protected $questionType;

    public function __construct()
    {
        $this->activityQuestions = new ArrayCollection();
        $this->options = new ArrayCollection();
        $this->resultGroups = new ArrayCollection();
        $this->resultUsers = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Question
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
     * Set the value of session_id.
     *
     * @param integer $session_id
     * @return \CoreBundle\Entity\Question
     */
    public function setSessionId($session_id)
    {
        $this->session_id = $session_id;

        return $this;
    }

    /**
     * Get the value of session_id.
     *
     * @return integer
     */
    public function getSessionId()
    {
        return $this->session_id;
    }

    /**
     * Set the value of question_type_id.
     *
     * @param integer $question_type_id
     * @return \CoreBundle\Entity\Question
     */
    public function setQuestionTypeId($question_type_id)
    {
        $this->question_type_id = $question_type_id;

        return $this;
    }

    /**
     * Get the value of question_type_id.
     *
     * @return integer
     */
    public function getQuestionTypeId()
    {
        return $this->question_type_id;
    }

    /**
     * Set the value of title.
     *
     * @param string $title
     * @return \CoreBundle\Entity\Question
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of detail.
     *
     * @param string $detail
     * @return \CoreBundle\Entity\Question
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get the value of detail.
     *
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set the value of suggestion.
     *
     * @param string $suggestion
     * @return \CoreBundle\Entity\Question
     */
    public function setSuggestion($suggestion)
    {
        $this->suggestion = $suggestion;

        return $this;
    }

    /**
     * Get the value of suggestion.
     *
     * @return string
     */
    public function getSuggestion()
    {
        return $this->suggestion;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\Question
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
     * Set the value of showanswer.
     *
     * @param boolean $showanswer
     * @return \CoreBundle\Entity\Question
     */
    public function setShowanswer($showanswer)
    {
        $this->showanswer = $showanswer;

        return $this;
    }

    /**
     * Get the value of showanswer.
     *
     * @return boolean
     */
    public function getShowanswer()
    {
        return $this->showanswer;
    }

    /**
     * Set the value of showresults.
     *
     * @param boolean $showresults
     * @return \CoreBundle\Entity\Question
     */
    public function setShowresults($showresults)
    {
        $this->showresults = $showresults;

        return $this;
    }

    /**
     * Get the value of showresults.
     *
     * @return boolean
     */
    public function getShowresults()
    {
        return $this->showresults;
    }

    /**
     * Set the value of available.
     *
     * @param boolean $available
     * @return \CoreBundle\Entity\Question
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
     * Add ActivityQuestion entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ActivityQuestion $activityQuestion
     * @return \CoreBundle\Entity\Question
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
     * @return \CoreBundle\Entity\Question
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
     * Add Option entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Option $option
     * @return \CoreBundle\Entity\Question
     */
    public function addOption(Option $option)
    {
        $this->options[] = $option;

        return $this;
    }

    /**
     * Remove Option entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Option $option
     * @return \CoreBundle\Entity\Question
     */
    public function removeOption(Option $option)
    {
        $this->options->removeElement($option);

        return $this;
    }

    /**
     * Get Option entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Add ResultGroup entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ResultGroup $resultGroup
     * @return \CoreBundle\Entity\Question
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
     * @return \CoreBundle\Entity\Question
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
     * Add ResultUser entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ResultUser $resultUser
     * @return \CoreBundle\Entity\Question
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
     * @return \CoreBundle\Entity\Question
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

    /**
     * Set Session entity (many to one).
     *
     * @param \CoreBundle\Entity\Session $session
     * @return \CoreBundle\Entity\Question
     */
    public function setSession(Session $session = null)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get Session entity (many to one).
     *
     * @return \CoreBundle\Entity\Session
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set QuestionType entity (many to one).
     *
     * @param \CoreBundle\Entity\QuestionType $questionType
     * @return \CoreBundle\Entity\Question
     */
    public function setQuestionType(QuestionType $questionType = null)
    {
        $this->questionType = $questionType;

        return $this;
    }

    /**
     * Get QuestionType entity (many to one).
     *
     * @return \CoreBundle\Entity\QuestionType
     */
    public function getQuestionType()
    {
        return $this->questionType;
    }

    public function __sleep()
    {
        return array('id', 'session_id', 'question_type_id', 'title', 'detail', 'suggestion', 'created_at', 'showanswer', 'showresults', 'available');
    }
}
