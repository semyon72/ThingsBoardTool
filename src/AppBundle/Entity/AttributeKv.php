<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttributeKv
 *
 * @ORM\Table(name="attribute_kv", uniqueConstraints={@ORM\UniqueConstraint(name="attribute_kv_unq_key", columns={"entity_type", "entity_id", "attribute_type", "attribute_key"})})
 * @ORM\Entity
 */
class AttributeKv
{
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
     * @var integer
     *
     * @ORM\Column(name="last_update_ts", type="bigint", nullable=true)
     */
    private $lastUpdateTs;

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
     * @ORM\Column(name="attribute_type", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $attributeType;

    /**
     * @var string
     *
     * @ORM\Column(name="attribute_key", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $attributeKey;



    /**
     * Set boolV
     *
     * @param boolean $boolV
     *
     * @return AttributeKv
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
     * @return AttributeKv
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
     * @return AttributeKv
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
     * @return AttributeKv
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
     * Set lastUpdateTs
     *
     * @param integer $lastUpdateTs
     *
     * @return AttributeKv
     */
    public function setLastUpdateTs($lastUpdateTs)
    {
        $this->lastUpdateTs = $lastUpdateTs;

        return $this;
    }

    /**
     * Get lastUpdateTs
     *
     * @return integer
     */
    public function getLastUpdateTs()
    {
        return $this->lastUpdateTs;
    }

    /**
     * Set entityType
     *
     * @param string $entityType
     *
     * @return AttributeKv
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
     * @return AttributeKv
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
     * Set attributeType
     *
     * @param string $attributeType
     *
     * @return AttributeKv
     */
    public function setAttributeType($attributeType)
    {
        $this->attributeType = $attributeType;

        return $this;
    }

    /**
     * Get attributeType
     *
     * @return string
     */
    public function getAttributeType()
    {
        return $this->attributeType;
    }

    /**
     * Set attributeKey
     *
     * @param string $attributeKey
     *
     * @return AttributeKv
     */
    public function setAttributeKey($attributeKey)
    {
        $this->attributeKey = $attributeKey;

        return $this;
    }

    /**
     * Get attributeKey
     *
     * @return string
     */
    public function getAttributeKey()
    {
        return $this->attributeKey;
    }
}
