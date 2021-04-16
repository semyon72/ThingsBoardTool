<?php

namespace DeviceKeeperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tariff
 *
 * @ORM\Table(name="tariff")
 * @ORM\Entity(repositoryClass="DeviceKeeperBundle\Repository\TariffRepository")
 */
class Tariff
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
     * @ORM\Column(name="value_name", type="string", length=48)
     */
    private $value_name;

    /**
     * @var float
     *
     * @ORM\Column(name="number_units", type="float")
     */
    private $number_units;

    /**
     * @var float
     *
     * @ORM\Column(name="tariff_per_unit", type="float")
     */
    private $tariff_per_unit;

    /**
     * @var float
     *
     * @ORM\Column(name="number_consumers", type="float")
     */
    private $number_consumers;

    /**
     * @var float
     *
     * @ORM\Column(name="units_per_consumer", type="float")
     */
    private $units_per_consumer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_begin", type="datetime")
     */
    private $date_begin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="datetime")
     */
    private $date_end;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_create", type="datetime")
     */
    private $date_create;


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
     * Set valueName
     *
     * @param string $valueName
     *
     * @return Tariff
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
     * Set numberUnits
     *
     * @param float $numberUnits
     *
     * @return Tariff
     */
    public function setNumberUnits($numberUnits)
    {
        $this->number_units = $numberUnits;

        return $this;
    }

    /**
     * Get numberUnits
     *
     * @return float
     */
    public function getNumberUnits()
    {
        return $this->number_units;
    }

    /**
     * Set tariffPerUnit
     *
     * @param float $tariffPerUnit
     *
     * @return Tariff
     */
    public function setTariffPerUnit($tariffPerUnit)
    {
        $this->tariff_per_unit = $tariffPerUnit;

        return $this;
    }

    /**
     * Get tariffPerUnit
     *
     * @return float
     */
    public function getTariffPerUnit()
    {
        return $this->tariff_per_unit;
    }

    /**
     * Set numberConsumers
     *
     * @param float $numberConsumers
     *
     * @return Tariff
     */
    public function setNumberConsumers($numberConsumers)
    {
        $this->number_consumers = $numberConsumers;

        return $this;
    }

    /**
     * Get numberConsumers
     *
     * @return float
     */
    public function getNumberConsumers()
    {
        return $this->number_consumers;
    }

    /**
     * Set unitsPerConsumer
     *
     * @param float $unitsPerConsumer
     *
     * @return Tariff
     */
    public function setUnitsPerConsumer($unitsPerConsumer)
    {
        $this->units_per_consumer = $unitsPerConsumer;

        return $this;
    }

    /**
     * Get unitsPerConsumer
     *
     * @return float
     */
    public function getUnitsPerConsumer()
    {
        return $this->units_per_consumer;
    }

    /**
     * Set dateBegin
     *
     * @param \DateTime $dateBegin
     *
     * @return Tariff
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
     * @return Tariff
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

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return Tariff
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

