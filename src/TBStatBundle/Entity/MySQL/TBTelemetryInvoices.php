<?php

namespace TBStatBundle\Entity\MySQL;

use Doctrine\ORM\Mapping as ORM;

/**
 * TBTelemetryInvoices
 *
 * @ORM\Table(name="tb_telemetry_invoices")
 * @ORM\Entity(repositoryClass="TBStatBundle\Repository\MySQL\TBTelemetryInvoicesRepository")
 */
class TBTelemetryInvoices
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="day_ts", type="integer")
     */
    private $day_ts;

    /**
     * @var string
     *
     * @ORM\Column(name="tb_id", type="string", length=48)
     */
    private $tb_id;

    /**
     * @var string
     *
     * @ORM\Column(name="tb_name", type="string", length=255)
     */
    private $tb_name;

    /**
     * @var string
     *
     * @ORM\Column(name="value_name", type="string", length=48)
     */
    private $value_name;

    /**
     * @var float
     *
     * @ORM\Column(name="value_begin", type="float")
     */
    private $value_begin;

    /**
     * @var float
     *
     * @ORM\Column(name="value_end", type="float")
     */
    private $value_end;

    /**
     * @var float
     *
     * @ORM\Column(name="value_diff", type="float")
     */
    private $value_diff;

    /**
     * @var float
     *
     * @ORM\Column(name="price_per_unit", type="string", length=48)
     */
    private $price_per_unit;

    /**
     * @var float
     *
     * @ORM\Column(name="total", type="float")
     */
    private $total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_create", type="datetime")
     */
    private $date_create;


    public function __construct() {
        $this->date_create = \DateTime();
    }    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dayTs
     *
     * @param integer $dayTs
     *
     * @return TBTelemetryInvoices
     */
    public function setDayTs($dayTs)
    {
        $this->day_ts = $dayTs;

        return $this;
    }

    /**
     * Get dayTs
     *
     * @return int
     */
    public function getDayTs()
    {
        return $this->day_ts;
    }

    /**
     * Set tbId
     *
     * @param string $tbId
     *
     * @return TBTelemetryInvoices
     */
    public function setTbId($tbId)
    {
        $this->tb_id = $tbId;

        return $this;
    }

    /**
     * Get tbId
     *
     * @return string
     */
    public function getTbId()
    {
        return $this->tb_id;
    }

    /**
     * Set tbName
     *
     * @param string $tbName
     *
     * @return TBTelemetryInvoices
     */
    public function setTbName($tbName)
    {
        $this->tb_name = $tbName;

        return $this;
    }

    /**
     * Get tbName
     *
     * @return string
     */
    public function getTbName()
    {
        return $this->tb_name;
    }

    /**
     * Set valueName
     *
     * @param string $valueName
     *
     * @return TBTelemetryInvoices
     */
    public function setValueName($valueName)
    {
        $this->value_name = $valueName;

        return $this;
    }

    /**
     * Get valueName
     *
     * @return string
     */
    public function getValueName()
    {
        return $this->value_name;
    }

    /**
     * Set valueBegin
     *
     * @param float $valueBegin
     *
     * @return TBTelemetryInvoices
     */
    public function setValueBegin($valueBegin)
    {
        $this->value_begin = $valueBegin;

        return $this;
    }

    /**
     * Get valueBegin
     *
     * @return float
     */
    public function getValueBegin()
    {
        return $this->value_begin;
    }

    /**
     * Set valueEnd
     *
     * @param float $valueEnd
     *
     * @return TBTelemetryInvoices
     */
    public function setValueEnd($valueEnd)
    {
        $this->value_end = $valueEnd;

        return $this;
    }

    /**
     * Get valueEnd
     *
     * @return float
     */
    public function getValueEnd()
    {
        return $this->value_end;
    }

    /**
     * Set valueDiff
     *
     * @param float $valueDiff
     *
     * @return TBTelemetryInvoices
     */
    public function setValueDiff($valueDiff)
    {
        $this->value_diff = $valueDiff;

        return $this;
    }

    /**
     * Get valueDiff
     *
     * @return float
     */
    public function getValueDiff()
    {
        return $this->value_diff;
    }

    /**
     * Set pricePerUnit
     *
     * @param float $pricePerUnit
     *
     * @return TBTelemetryInvoices
     */
    public function setPricePerUnit($pricePerUnit)
    {
        $this->price_per_unit = $pricePerUnit;

        return $this;
    }

    /**
     * Get pricePerUnit
     *
     * @return float
     */
    public function getPricePerUnit()
    {
        return $this->price_per_unit;
    }

    /**
     * Set total
     *
     * @param float $total
     *
     * @return TBTelemetryInvoices
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return TBTelemetryInvoices
     */
    public function setDateCreate($dateCreate)
    {
        $this->date_create = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return \DateTime
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }
}

