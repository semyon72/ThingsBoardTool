<?php

namespace DeviceKeeperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TariffDevice
 *
 * @ORM\Table(name="tariff_device")
 * @ORM\Entity(repositoryClass="DeviceKeeperBundle\Repository\TariffDeviceRepository")
 */
class TariffDevice
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
     * @ORM\Column(name="tariff_id", type="integer")
     */
    private $tariff_id;

    /**
     * @var string
     *
     * @ORM\Column(name="tb_id", type="string", length=48)
     */
    private $tb_id;


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
     * Set tariffId
     *
     * @param integer $tariffId
     *
     * @return TariffDevice
     */
    public function setTariffId($tariffId)
    {
        $this->tariff_id = $tariffId;

        return $this;
    }

    /**
     * Get tariffId
     *
     * @return int
     */
    public function getTariffId()
    {
        return $this->tariff_id;
    }

    /**
     * Set tbId
     *
     * @param string $tbId
     *
     * @return TariffDevice
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
}

