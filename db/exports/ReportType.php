<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CoreBundle\Entity\ReportType
 *
 * @ORM\Entity()
 * @ORM\Table(name="report_type")
 */
class ReportType
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
     * @ORM\Column(name="`name`", type="string", length=200, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $explanation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $daily;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $weekly;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $monthly;

    /**
     * @ORM\OneToMany(targetEntity="ClassroomReport", mappedBy="reportType")
     * @ORM\JoinColumn(name="id", referencedColumnName="report_type_id", nullable=false)
     */
    protected $classroomReports;

    public function __construct()
    {
        $this->classroomReports = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\ReportType
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
     * @return \CoreBundle\Entity\ReportType
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
     * @return \CoreBundle\Entity\ReportType
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
     * @return \CoreBundle\Entity\ReportType
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
     * Set the value of daily.
     *
     * @param boolean $daily
     * @return \CoreBundle\Entity\ReportType
     */
    public function setDaily($daily)
    {
        $this->daily = $daily;

        return $this;
    }

    /**
     * Get the value of daily.
     *
     * @return boolean
     */
    public function getDaily()
    {
        return $this->daily;
    }

    /**
     * Set the value of weekly.
     *
     * @param boolean $weekly
     * @return \CoreBundle\Entity\ReportType
     */
    public function setWeekly($weekly)
    {
        $this->weekly = $weekly;

        return $this;
    }

    /**
     * Get the value of weekly.
     *
     * @return boolean
     */
    public function getWeekly()
    {
        return $this->weekly;
    }

    /**
     * Set the value of monthly.
     *
     * @param boolean $monthly
     * @return \CoreBundle\Entity\ReportType
     */
    public function setMonthly($monthly)
    {
        $this->monthly = $monthly;

        return $this;
    }

    /**
     * Get the value of monthly.
     *
     * @return boolean
     */
    public function getMonthly()
    {
        return $this->monthly;
    }

    /**
     * Add ClassroomReport entity to collection (one to many).
     *
     * @param \CoreBundle\Entity\ClassroomReport $classroomReport
     * @return \CoreBundle\Entity\ReportType
     */
    public function addClassroomReport(ClassroomReport $classroomReport)
    {
        $this->classroomReports[] = $classroomReport;

        return $this;
    }

    /**
     * Remove ClassroomReport entity from collection (one to many).
     *
     * @param \CoreBundle\Entity\ClassroomReport $classroomReport
     * @return \CoreBundle\Entity\ReportType
     */
    public function removeClassroomReport(ClassroomReport $classroomReport)
    {
        $this->classroomReports->removeElement($classroomReport);

        return $this;
    }

    /**
     * Get ClassroomReport entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassroomReports()
    {
        return $this->classroomReports;
    }

    public function __sleep()
    {
        return array('id', 'available', 'name', 'explanation', 'daily', 'weekly', 'monthly');
    }
}