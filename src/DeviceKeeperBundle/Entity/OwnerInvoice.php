<?php

namespace DeviceKeeperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OwnerInvoice
 *
 * @ORM\Table(name="owner_invoice")
 * @ORM\Entity(repositoryClass="DeviceKeeperBundle\Repository\OwnerInvoiceRepository")
 */
class OwnerInvoice
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
     * @ORM\Column(name="owner_id", type="integer")
     */
    private $owner_id;

    /**
     * @var int
     *
     * @ORM\Column(name="ownergroup_id", type="integer")
     */
    private $ownergroup_id;

    /**
     * @var string
     *
     * @ORM\Column(name="tb_id", type="string", length=48)
     */
    private $tb_id;

    /**
     * @var int
     *
     * @ORM\Column(name="day_ts", type="integer")
     */
    private $day_ts;

    /**
     * @var string
     *
     * @ORM\Column(name="value_name", type="string", length=48)
     */
    private $value_name;

    /**
     * @var float
     *
     * @ORM\Column(name="value_begin", type="float")
     */
    private $value_begin;

    /**
     * @var float
     *
     * @ORM\Column(name="value_end", type="float")
     */
    private $value_end;

    /**
     * @var float
     *
     * @ORM\Column(name="units_diff", type="float")
     */
    private $units_diff;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="amount_ext", type="float")
     */
    private $amount_ext;

    /**
     * @var string
     *
     * @ORM\Column(name="amount_ext_description", type="string", length=255)
     */
    private $amount_ext_description;

    
    /**
     *
     * @var OwnerGroup
     * 
     * @ORM\ManyToOne (targetEntity="OwnerGroup")
     * @ORM\JoinColumn (name="ownergroup_id", referencedColumnName="id")
     */
    private $group;
    
    /**
     *
     * @var Owner
     * 
     * @ORM\ManyToOne (targetEntity="Owner")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id") 
     */
    private $owner;


    public function getOwner(){
        return($this->owner);
    }

    
    public function setOwner(Owner $owner){
        $this->owner = $owner;
        return($this);
    }


    public function getGroup(){
        return($this->group);
    }

    
    public function setGroup(OwnerGroup $group){
        $this->group = $group;
        return($this);
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
     * Set ownerId
     *
     * @param integer $ownerId
     *
     * @return OwnerInvoice
     */
    public function setOwnerId($ownerId)
    {
        $this->owner_id = $ownerId;

        return $this;
    }

    /**
     * Get ownerId
     *
     * @return int
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * Set ownergroupId
     *
     * @param integer $ownergroupId
     *
     * @return OwnerInvoice
     */
    public function setOwnergroupId($ownergroupId)
    {
        $this->ownergroup_id = $ownergroupId;

        return $this;
    }

    /**
     * Get ownergroupId
     *
     * @return int
     */
    public function getOwnergroupId()
    {
        return $this->ownergroup_id;
    }

    /**
     * Set tbId
     *
     * @param string $tbId
     *
     * @return OwnerInvoice
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
     * Set dayTs
     *
     * @param integer $dayTs
     *
     * @return OwnerInvoice
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
     * Set valueName
     *
     * @param string $valueName
     *
     * @return OwnerInvoice
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
     * Set valueBegin
     *
     * @param float $valueBegin
     *
     * @return OwnerInvoice
     */
    public function setValueBegin($valueBegin)
    {
        $this->value_begin = $valueBegin;

        return $this;
    }

    /**
     * Get valueBegin
     *
     * @return float
     */
    public function getValueBegin()
    {
        return $this->value_begin;
    }

    /**
     * Set valueEnd
     *
     * @param float $valueEnd
     *
     * @return OwnerInvoice
     */
    public function setValueEnd($valueEnd)
    {
        $this->value_end = $valueEnd;

        return $this;
    }

    /**
     * Get valueEnd
     *
     * @return float
     */
    public function getValueEnd()
    {
        return $this->value_end;
    }

    /**
     * Set unitsDiff
     *
     * @param float $unitsDiff
     *
     * @return OwnerInvoice
     */
    public function setUnitsDiff($unitsDiff)
    {
        $this->units_diff = $unitsDiff;

        return $this;
    }

    /**
     * Get unitsDiff
     *
     * @return float
     */
    public function getUnitsDiff()
    {
        return $this->units_diff;
    }

    /**
     * Set amount
     *
     * @param float $amount
     *
     * @return OwnerInvoice
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set amountExt
     *
     * @param float $amountExt
     *
     * @return OwnerInvoice
     */
    public function setAmountExt($amountExt)
    {
        $this->amount_ext = $amountExt;

        return $this;
    }

    /**
     * Get amountExt
     *
     * @return float
     */
    public function getAmountExt()
    {
        return $this->amount_ext;
    }

    /**
     * Set amountExtDescription
     *
     * @param string $amountExtDescription
     *
     * @return OwnerInvoice
     */
    public function setAmountExtDescription($amountExtDescription)
    {
        $this->amount_ext_description = $amountExtDescription;

        return $this;
    }

    /**
     * Get amountExtDescription
     *
     * @return string
     */
    public function getAmountExtDescription()
    {
        return $this->amount_ext_description;
    }
}

