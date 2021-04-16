<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alarm
 *
 * @ORM\Table(name="alarm")
 * @ORM\Entity
 */
class Alarm
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ack_ts", type="bigint", nullable=true)
     */
    private $ackTs;

    /**
     * @var integer
     *
     * @ORM\Column(name="clear_ts", type="bigint", nullable=true)
     */
    private $clearTs;

    /**
     * @var string
     *
     * @ORM\Column(name="additional_info", type="string", nullable=true)
     */
    private $additionalInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="end_ts", type="bigint", nullable=true)
     */
    private $endTs;

    /**
     * @var string
     *
     * @ORM\Column(name="originator_id", type="string", length=31, nullable=true)
     */
    private $originatorId;

    /**
     * @var integer
     *
     * @ORM\Column(name="originator_type", type="integer", nullable=true)
     */
    private $originatorType;

    /**
     * @var boolean
     *
     * @ORM\Column(name="propagate", type="boolean", nullable=true)
     */
    private $propagate;

    /**
     * @var string
     *
     * @ORM\Column(name="severity", type="string", length=255, nullable=true)
     */
    private $severity;

    /**
     * @var integer
     *
     * @ORM\Column(name="start_ts", type="bigint", nullable=true)
     */
    private $startTs;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="tenant_id", type="string", length=31, nullable=true)
     */
    private $tenantId;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=31)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="alarm_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;



    /**
     * Set ackTs
     *
     * @param integer $ackTs
     *
     * @return Alarm
     */
    public function setAckTs($ackTs)
    {
        $this->ackTs = $ackTs;

        return $this;
    }

    /**
     * Get ackTs
     *
     * @return integer
     */
    public function getAckTs()
    {
        return $this->ackTs;
    }

    /**
     * Set clearTs
     *
     * @param integer $clearTs
     *
     * @return Alarm
     */
    public function setClearTs($clearTs)
    {
        $this->clearTs = $clearTs;

        return $this;
    }

    /**
     * Get clearTs
     *
     * @return integer
     */
    public function getClearTs()
    {
        return $this->clearTs;
    }

    /**
     * Set additionalInfo
     *
     * @param string $additionalInfo
     *
     * @return Alarm
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;

        return $this;
    }

    /**
     * Get additionalInfo
     *
     * @return string
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * Set endTs
     *
     * @param integer $endTs
     *
     * @return Alarm
     */
    public function setEndTs($endTs)
    {
        $this->endTs = $endTs;

        return $this;
    }

    /**
     * Get endTs
     *
     * @return integer
     */
    public function getEndTs()
    {
        return $this->endTs;
    }

    /**
     * Set originatorId
     *
     * @param string $originatorId
     *
     * @return Alarm
     */
    public function setOriginatorId($originatorId)
    {
        $this->originatorId = $originatorId;

        return $this;
    }

    /**
     * Get originatorId
     *
     * @return string
     */
    public function getOriginatorId()
    {
        return $this->originatorId;
    }

    /**
     * Set originatorType
     *
     * @param integer $originatorType
     *
     * @return Alarm
     */
    public function setOriginatorType($originatorType)
    {
        $this->originatorType = $originatorType;

        return $this;
    }

    /**
     * Get originatorType
     *
     * @return integer
     */
    public function getOriginatorType()
    {
        return $this->originatorType;
    }

    /**
     * Set propagate
     *
     * @param boolean $propagate
     *
     * @return Alarm
     */
    public function setPropagate($propagate)
    {
        $this->propagate = $propagate;

        return $this;
    }

    /**
     * Get propagate
     *
     * @return boolean
     */
    public function getPropagate()
    {
        return $this->propagate;
    }

    /**
     * Set severity
     *
     * @param string $severity
     *
     * @return Alarm
     */
    public function setSeverity($severity)
    {
        $this->severity = $severity;

        return $this;
    }

    /**
     * Get severity
     *
     * @return string
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * Set startTs
     *
     * @param integer $startTs
     *
     * @return Alarm
     */
    public function setStartTs($startTs)
    {
        $this->startTs = $startTs;

        return $this;
    }

    /**
     * Get startTs
     *
     * @return integer
     */
    public function getStartTs()
    {
        return $this->startTs;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Alarm
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set tenantId
     *
     * @param string $tenantId
     *
     * @return Alarm
     */
    public function setTenantId($tenantId)
    {
        $this->tenantId = $tenantId;

        return $this;
    }

    /**
     * Get tenantId
     *
     * @return string
     */
    public function getTenantId()
    {
        return $this->tenantId;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Alarm
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
