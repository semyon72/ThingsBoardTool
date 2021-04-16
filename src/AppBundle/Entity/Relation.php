<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relation
 *
 * @ORM\Table(name="relation", uniqueConstraints={@ORM\UniqueConstraint(name="relation_unq_key", columns={"from_id", "from_type", "relation_type_group", "relation_type", "to_id", "to_type"})})
 * @ORM\Entity
 */
class Relation
{
    /**
     * @var string
     *
     * @ORM\Column(name="additional_info", type="string", nullable=true)
     */
    private $additionalInfo;

    /**
     * @var string
     *
     * @ORM\Column(name="from_id", type="string", length=31)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fromId;

    /**
     * @var string
     *
     * @ORM\Column(name="from_type", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $fromType;

    /**
     * @var string
     *
     * @ORM\Column(name="relation_type_group", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $relationTypeGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="relation_type", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $relationType;

    /**
     * @var string
     *
     * @ORM\Column(name="to_id", type="string", length=31)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $toId;

    /**
     * @var string
     *
     * @ORM\Column(name="to_type", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $toType;



    /**
     * Set additionalInfo
     *
     * @param string $additionalInfo
     *
     * @return Relation
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
     * Set fromId
     *
     * @param string $fromId
     *
     * @return Relation
     */
    public function setFromId($fromId)
    {
        $this->fromId = $fromId;

        return $this;
    }

    /**
     * Get fromId
     *
     * @return string
     */
    public function getFromId()
    {
        return $this->fromId;
    }

    /**
     * Set fromType
     *
     * @param string $fromType
     *
     * @return Relation
     */
    public function setFromType($fromType)
    {
        $this->fromType = $fromType;

        return $this;
    }

    /**
     * Get fromType
     *
     * @return string
     */
    public function getFromType()
    {
        return $this->fromType;
    }

    /**
     * Set relationTypeGroup
     *
     * @param string $relationTypeGroup
     *
     * @return Relation
     */
    public function setRelationTypeGroup($relationTypeGroup)
    {
        $this->relationTypeGroup = $relationTypeGroup;

        return $this;
    }

    /**
     * Get relationTypeGroup
     *
     * @return string
     */
    public function getRelationTypeGroup()
    {
        return $this->relationTypeGroup;
    }

    /**
     * Set relationType
     *
     * @param string $relationType
     *
     * @return Relation
     */
    public function setRelationType($relationType)
    {
        $this->relationType = $relationType;

        return $this;
    }

    /**
     * Get relationType
     *
     * @return string
     */
    public function getRelationType()
    {
        return $this->relationType;
    }

    /**
     * Set toId
     *
     * @param string $toId
     *
     * @return Relation
     */
    public function setToId($toId)
    {
        $this->toId = $toId;

        return $this;
    }

    /**
     * Get toId
     *
     * @return string
     */
    public function getToId()
    {
        return $this->toId;
    }

    /**
     * Set toType
     *
     * @param string $toType
     *
     * @return Relation
     */
    public function setToType($toType)
    {
        $this->toType = $toType;

        return $this;
    }

    /**
     * Get toType
     *
     * @return string
     */
    public function getToType()
    {
        return $this->toType;
    }
}
