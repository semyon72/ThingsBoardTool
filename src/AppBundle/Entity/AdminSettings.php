<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdminSettings
 *
 * @ORM\Table(name="admin_settings")
 * @ORM\Entity
 */
class AdminSettings
{
    /**
     * @var string
     *
     * @ORM\Column(name="json_value", type="string", nullable=true)
     */
    private $jsonValue;

    /**
     * @var string
     *
     * @ORM\Column(name="key", type="string", length=255, nullable=true)
     */
    private $key;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=31)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="admin_settings_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;



    /**
     * Set jsonValue
     *
     * @param string $jsonValue
     *
     * @return AdminSettings
     */
    public function setJsonValue($jsonValue)
    {
        $this->jsonValue = $jsonValue;

        return $this;
    }

    /**
     * Get jsonValue
     *
     * @return string
     */
    public function getJsonValue()
    {
        return $this->jsonValue;
    }

    /**
     * Set key
     *
     * @param string $key
     *
     * @return AdminSettings
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
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
