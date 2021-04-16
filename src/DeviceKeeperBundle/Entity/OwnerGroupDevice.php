<?php

namespace DeviceKeeperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * OwnerGroupDevice
 *
 * @ORM\Table(name="owner_group_device")
 * @ORM\Entity(repositoryClass="DeviceKeeperBundle\Repository\OwnerGroupDeviceRepository")
 */
class OwnerGroupDevice
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
     * @ORM\ManyToOne (targetEntity="OwnerGroup", inversedBy="devices" )
     * @ORM\JoinColumn (name="ownergroup_id", referencedColumnName="id", nullable=true)
     */
    private $group;
    

    public function getGroup(){
        return($this->group);
    }

    
    public function setGroup(OwnerGroup $group ){
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
     * Set ownergroupId
     *
     * @param integer $ownergroupId
     *
     * @return OwnerGroupDevice
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
     * @return OwnerGroupDevice
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

