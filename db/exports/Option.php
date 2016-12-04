<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\Option
 *
 * @ORM\Entity()
 * @ORM\Table(name="`option`", indexes={@ORM\Index(name="fk_option_question_idx", columns={"question_id"})})
 */
class Option
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
    protected $question_id;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $detail;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $iscorrect;

    /**
     * @ORM\OneToMany(targetEntity="ResultUser", mappedBy="option")
     * @ORM\JoinColumn(name="id", referencedColumnName="option_id", nullable=false)
     */
    protected $resultUsers;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="options")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=false)
     */
    protected $question;

    public function __construct()
    {
        $this->resultUsers = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\Option
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
     * Set the value of question_id.
     *
     * @param integer $question_id
     * @return \CoreBundle\Entity\Option
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
     * Set the value of detail.
     *
     * @param string $detail
     * @return \CoreBundle\Entity\Option
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
     * Set the value of iscorrect.
     *
     * @param boolean $iscorrect
     * @return \CoreBundle\Entity\Option
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
     * Add ResultUser entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ResultUser $resultUser
     * @return \CoreBundle\Entity\Option
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
     * @return \CoreBundle\Entity\Option
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
     * Set Question entity (many to one).
     *
     * @param \CoreBundle\Entity\Question $question
     * @return \CoreBundle\Entity\Option
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
        return array('id', 'question_id', 'detail', 'iscorrect');
    }
}