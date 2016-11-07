<?php

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreBundle\Entity\ClassroomReport
 *
 * @ORM\Entity()
 * @ORM\Table(name="classroom_report", indexes={@ORM\Index(name="fk_classroom_report_report_type1_idx", columns={"report_type_id"}), @ORM\Index(name="fk_classroom_report_classroom1_idx", columns={"classroom_id"})})
 */
class ClassroomReport
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
    protected $report_type_id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $classroom_id;

    /**
     * @ORM\ManyToOne(targetEntity="ReportType", inversedBy="classroomReports")
     * @ORM\JoinColumn(name="report_type_id", referencedColumnName="id", nullable=false)
     */
    protected $reportType;

    /**
     * @ORM\ManyToOne(targetEntity="Classroom", inversedBy="classroomReports")
     * @ORM\JoinColumn(name="classroom_id", referencedColumnName="id", nullable=false)
     */
    protected $classroom;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \CoreBundle\Entity\ClassroomReport
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
     * Set the value of report_type_id.
     *
     * @param integer $report_type_id
     * @return \CoreBundle\Entity\ClassroomReport
     */
    public function setReportTypeId($report_type_id)
    {
        $this->report_type_id = $report_type_id;

        return $this;
    }

    /**
     * Get the value of report_type_id.
     *
     * @return integer
     */
    public function getReportTypeId()
    {
        return $this->report_type_id;
    }

    /**
     * Set the value of classroom_id.
     *
     * @param integer $classroom_id
     * @return \CoreBundle\Entity\ClassroomReport
     */
    public function setClassroomId($classroom_id)
    {
        $this->classroom_id = $classroom_id;

        return $this;
    }

    /**
     * Get the value of classroom_id.
     *
     * @return integer
     */
    public function getClassroomId()
    {
        return $this->classroom_id;
    }

    /**
     * Set ReportType entity (many to one).
     *
     * @param \CoreBundle\Entity\ReportType $reportType
     * @return \CoreBundle\Entity\ClassroomReport
     */
    public function setReportType(ReportType $reportType = null)
    {
        $this->reportType = $reportType;

        return $this;
    }

    /**
     * Get ReportType entity (many to one).
     *
     * @return \CoreBundle\Entity\ReportType
     */
    public function getReportType()
    {
        return $this->reportType;
    }

    /**
     * Set Classroom entity (many to one).
     *
     * @param \CoreBundle\Entity\Classroom $classroom
     * @return \CoreBundle\Entity\ClassroomReport
     */
    public function setClassroom(Classroom $classroom = null)
    {
        $this->classroom = $classroom;

        return $this;
    }

    /**
     * Get Classroom entity (many to one).
     *
     * @return \CoreBundle\Entity\Classroom
     */
    public function getClassroom()
    {
        return $this->classroom;
    }

    public function __sleep()
    {
        return array('id', 'report_type_id', 'classroom_id');
    }
}