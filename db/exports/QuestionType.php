<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\QuestionType
 *
 * @ORM\Entity()
 * @ORM\Table(name="question_type")
 */
class QuestionType
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
     * @ORM\Column(name="`boolean`", type="boolean", nullable=true)
     */
    protected $boolean;

    /**
     * @ORM\Column(type="text")
     */
    protected $explanation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $externalsource;

    /**
     * @ORM\Column(name="`name`", type="string", length=45)
     */
    protected $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $multiplechoice;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $oneoption;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $shortanswer;

    /**
     * @ORM\Column(type="date")
     */
    protected $created_at;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $icon;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="questionType")
     * @ORM\JoinColumn(name="id", referencedColumnName="question_type_id", nullable=false)
     */
    protected $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\QuestionType
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
     * @return \CoreBundle\Entity\QuestionType
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
     * Set the value of boolean.
     *
     * @param boolean $boolean
     * @return \CoreBundle\Entity\QuestionType
     */
    public function setBoolean($boolean)
    {
        $this->boolean = $boolean;

        return $this;
    }

    /**
     * Get the value of boolean.
     *
     * @return boolean
     */
    public function getBoolean()
    {
        return $this->boolean;
    }

    /**
     * Set the value of explanation.
     *
     * @param string $explanation
     * @return \CoreBundle\Entity\QuestionType
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
     * Set the value of externalsource.
     *
     * @param boolean $externalsource
     * @return \CoreBundle\Entity\QuestionType
     */
    public function setExternalsource($externalsource)
    {
        $this->externalsource = $externalsource;

        return $this;
    }

    /**
     * Get the value of externalsource.
     *
     * @return boolean
     */
    public function getExternalsource()
    {
        return $this->externalsource;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \CoreBundle\Entity\QuestionType
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
     * Set the value of multiplechoice.
     *
     * @param boolean $multiplechoice
     * @return \CoreBundle\Entity\QuestionType
     */
    public function setMultiplechoice($multiplechoice)
    {
        $this->multiplechoice = $multiplechoice;

        return $this;
    }

    /**
     * Get the value of multiplechoice.
     *
     * @return boolean
     */
    public function getMultiplechoice()
    {
        return $this->multiplechoice;
    }

    /**
     * Set the value of oneoption.
     *
     * @param boolean $oneoption
     * @return \CoreBundle\Entity\QuestionType
     */
    public function setOneoption($oneoption)
    {
        $this->oneoption = $oneoption;

        return $this;
    }

    /**
     * Get the value of oneoption.
     *
     * @return boolean
     */
    public function getOneoption()
    {
        return $this->oneoption;
    }

    /**
     * Set the value of shortanswer.
     *
     * @param boolean $shortanswer
     * @return \CoreBundle\Entity\QuestionType
     */
    public function setShortanswer($shortanswer)
    {
        $this->shortanswer = $shortanswer;

        return $this;
    }

    /**
     * Get the value of shortanswer.
     *
     * @return boolean
     */
    public function getShortanswer()
    {
        return $this->shortanswer;
    }

    /**
     * Set the value of created_at.
     *
     * @param \DateTime $created_at
     * @return \CoreBundle\Entity\QuestionType
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
     * Set the value of icon.
     *
     * @param string $icon
     * @return \CoreBundle\Entity\QuestionType
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get the value of icon.
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Add Question entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\Question $question
     * @return \CoreBundle\Entity\QuestionType
     */
    public function addQuestion(Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove Question entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\Question $question
     * @return \CoreBundle\Entity\QuestionType
     */
    public function removeQuestion(Question $question)
    {
        $this->questions->removeElement($question);

        return $this;
    }

    /**
     * Get Question entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    public function __sleep()
    {
        return array('id', 'available', 'boolean', 'explanation', 'externalsource', 'name', 'multiplechoice', 'oneoption', 'shortanswer', 'created_at', 'icon');
    }
}