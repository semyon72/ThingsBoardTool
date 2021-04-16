<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TsKvLatest
 *
 * @ORM\Table(name="ts_kv_latest", uniqueConstraints={@ORM\UniqueConstraint(name="ts_kv_latest_unq_key", columns={"entity_type", "entity_id", "key"})})
 * @ORM\Entity
 */
class TsKvLatest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ts", type="bigint", nullable=false)
     */
    private $ts;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bool_v", type="boolean", nullable=true)
     */
    private $boolV;

    /**
     * @var string
     *
     * @ORM\Column(name="str_v", type="string", length=10000000, nullable=true)
     */
    private $strV;

    /**
     * @var integer
     *
     * @ORM\Column(name="long_v", type="bigint", nullable=true)
     */
    private $longV;

    /**
     * @var float
     *
     * @ORM\Column(name="dbl_v", type="float", precision=10, scale=0, nullable=true)
     */
    private $dblV;

    /**
     * @var string
     *
     * @ORM\Column(name="entity_type", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $entityType;

    /**
     * @var string
     *
     * @ORM\Column(name="entity_id", type="string", length=31)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $entityId;

    /**
     * @var string
     *
     * @ORM\Column(name="key", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $key;



    /**
     * Set ts
     *
     * @param integer $ts
     *
     * @return TsKvLatest
     */
    public function setTs($ts)
    {
        $this->ts = $ts;

        return $this;
    }

    /**
     * Get ts
     *
     * @return integer
     */
    public function getTs()
    {
        return $this->ts;
    }

    /**
     * Set boolV
     *
     * @param boolean $boolV
     *
     * @return TsKvLatest
     */
    public function setBoolV($boolV)
    {
        $this->boolV = $boolV;

        return $this;
    }

    /**
     * Get boolV
     *
     * @return boolean
     */
    public function getBoolV()
    {
        return $this->boolV;
    }

    /**
     * Set strV
     *
     * @param string $strV
     *
     * @return TsKvLatest
     */
    public function setStrV($strV)
    {
        $this->strV = $strV;

        return $this;
    }

    /**
     * Get strV
     *
     * @return string
     */
    public function getStrV()
    {
        return $this->strV;
    }

    /**
     * Set longV
     *
     * @param integer $longV
     *
     * @return TsKvLatest
     */
    public function setLongV($longV)
    {
        $this->longV = $longV;

        return $this;
    }

    /**
     * Get longV
     *
     * @return integer
     */
    public function getLongV()
    {
        return $this->longV;
    }

    /**
     * Set dblV
     *
     * @param float $dblV
     *
     * @return TsKvLatest
     */
    public function setDblV($dblV)
    {
        $this->dblV = $dblV;

        return $this;
    }

    /**
     * Get dblV
     *
     * @return float
     */
    public function getDblV()
    {
        return $this->dblV;
    }

    /**
     * Set entityType
     *
     * @param string $entityType
     *
     * @return TsKvLatest
     */
    public function setEntityType($entityType)
    {
        $this->entityType = $entityType;

        return $this;
    }

    /**
     * Get entityType
     *
     * @return string
     */
    public function getEntityType()
    {
        return $this->entityType;
    }

    /**
     * Set entityId
     *
     * @param string $entityId
     *
     * @return TsKvLatest
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * Get entityId
     *
     * @return string
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * Set key
     *
     * @param string $key
     *
     * @return TsKvLatest
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
}
