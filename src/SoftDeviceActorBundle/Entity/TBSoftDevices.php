<?php

namespace SoftDeviceActorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TBSoftDevices
 *
 * @ORM\Table(name="tb_softdevices")
 * @ORM\Entity(repositoryClass="SoftDeviceActorBundle\Repository\TBSoftDevicesRepository")
 */
class TBSoftDevices
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
     * @var string
     *
     * @ORM\Column(name="tb_id", type="string", length=48)
     */
    private $tb_id;

    /**
     * @var string
     *
     * @ORM\Column(name="value_name", type="string", length=48)
     */
    private $value_name;

    /**
     * @var string
     *
     * @ORM\Column(name="phpclassname_forecast", type="string", length=255)
     */
    private $phpclassname_forecast;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $date_created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_begin", type="datetime")
     */
    private $date_begin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=true)
     */
    private $date_end;


    public function __construct() {
        $nowDate = new \DateTime();
        $this->setDateCreated($nowDate)->setDateBegin( clone($nowDate) );
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
     * Set tbId
     *
     * @param string $tbId
     *
     * @return TBSoftDevices
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
     * Set valueName
     *
     * @param string $valueName
     *
     * @return TBSoftDevices
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
     * Set phpclassnameForecast
     *
     * @param string $phpclassnameForecast
     *
     * @return TBSoftDevices
     */
    public function setPhpclassnameForecast($phpclassnameForecast)
    {
        $this->phpclassname_forecast = $phpclassnameForecast;

        return $this;
    }

    /**
     * Get phpclassnameForecast
     *
     * @return string
     */
    public function getPhpclassnameForecast()
    {
        return $this->phpclassname_forecast;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return TBSoftDevices
     */
    public function setDateCreated($dateCreated)
    {
        $this->date_created = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Set dateBegin
     *
     * @param \DateTime $dateBegin
     *
     * @return TBSoftDevices
     */
    public function setDateBegin($dateBegin)
    {
        $this->date_begin = $dateBegin;

        return $this;
    }

    /**
     * Get dateBegin
     *
     * @return \DateTime
     */
    public function getDateBegin()
    {
        return $this->date_begin;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     *
     * @return TBSoftDevices
     */
    public function setDateEnd($dateEnd)
    {
        $this->date_end = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->date_end;
    }
}

