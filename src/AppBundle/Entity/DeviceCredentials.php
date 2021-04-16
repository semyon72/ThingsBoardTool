<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeviceCredentials
 *
 * @ORM\Table(name="device_credentials")
 * @ORM\Entity
 */
class DeviceCredentials
{
    /**
     * @var string
     *
     * @ORM\Column(name="credentials_id", type="string", nullable=true)
     */
    private $credentialsId;

    /**
     * @var string
     *
     * @ORM\Column(name="credentials_type", type="string", length=255, nullable=true)
     */
    private $credentialsType;

    /**
     * @var string
     *
     * @ORM\Column(name="credentials_value", type="string", nullable=true)
     */
    private $credentialsValue;

    /**
     * @var string
     *
     * @ORM\Column(name="device_id", type="string", length=31, nullable=true)
     */
    private $deviceId;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=31)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="device_credentials_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;



    /**
     * Set credentialsId
     *
     * @param string $credentialsId
     *
     * @return DeviceCredentials
     */
    public function setCredentialsId($credentialsId)
    {
        $this->credentialsId = $credentialsId;

        return $this;
    }

    /**
     * Get credentialsId
     *
     * @return string
     */
    public function getCredentialsId()
    {
        return $this->credentialsId;
    }

    /**
     * Set credentialsType
     *
     * @param string $credentialsType
     *
     * @return DeviceCredentials
     */
    public function setCredentialsType($credentialsType)
    {
        $this->credentialsType = $credentialsType;

        return $this;
    }

    /**
     * Get credentialsType
     *
     * @return string
     */
    public function getCredentialsType()
    {
        return $this->credentialsType;
    }

    /**
     * Set credentialsValue
     *
     * @param string $credentialsValue
     *
     * @return DeviceCredentials
     */
    public function setCredentialsValue($credentialsValue)
    {
        $this->credentialsValue = $credentialsValue;

        return $this;
    }

    /**
     * Get credentialsValue
     *
     * @return string
     */
    public function getCredentialsValue()
    {
        return $this->credentialsValue;
    }

    /**
     * Set deviceId
     *
     * @param string $deviceId
     *
     * @return DeviceCredentials
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;

        return $this;
    }

    /**
     * Get deviceId
     *
     * @return string
     */
    public function getDeviceId()
    {
        return $this->deviceId;
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
