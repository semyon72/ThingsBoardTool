<?php

namespace SoftDeviceActorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TBSoftDevicesScheduledTasks
 *
 * @ORM\Table(name="tb_softdevices_scheduled_tasks")
 * @ORM\Entity(repositoryClass="SoftDeviceActorBundle\Repository\TBSoftDevicesScheduledTasksRepository")
 */
class TBSoftDevicesScheduledTasks
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
     * @ORM\Column(name="value_name", type="string", length=48)
     */
    private $value_name;

    /**
     * @var float
     *
     * @ORM\Column(name="value_limit", type="float")
     */
    private $value_limit;

    /**
     * @var float
     *
     * @ORM\Column(name="value_used", type="float")
     */
    private $value_used;

    /**
     * @var string
     *
     * @ORM\Column(name="schedule", type="text")
     */
    private $schedule;

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
     * @return TBSoftDevicesScheduledTasks
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
     * @return TBSoftDevicesScheduledTasks
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
     * @return TBSoftDevicesScheduledTasks
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
     * Set valueLimit
     *
     * @param float $valueLimit
     *
     * @return TBSoftDevicesScheduledTasks
     */
    public function setValueLimit($valueLimit)
    {
        $this->value_limit = $valueLimit;

        return $this;
    }

    /**
     * Get valueLimit
     *
     * @return float
     */
    public function getValueLimit()
    {
        return $this->value_limit;
    }

    /**
     * Set valueUsed
     *
     * @param float $valueUsed
     *
     * @return TBSoftDevicesScheduledTasks
     */
    public function setValueUsed($valueUsed)
    {
        $this->value_used = $valueUsed;

        return $this;
    }

    /**
     * Get valueUsed
     *
     * @return float
     */
    public function getValueUsed()
    {
        return $this->value_used;
    }

    
    /**
     * Set schedule
     *
     * @param string $schedule
     *
     * @return TBSoftDevicesScheduledTasks
     */
    public function setSchedule($schedule)
    {
        $this->schedule = "$schedule";

        return $this;
    }

    /**
     * Get schedule
     *
     * @return string
     */
    public function getSchedule()
    {
        return $this->schedule;
    }
    
    
}

