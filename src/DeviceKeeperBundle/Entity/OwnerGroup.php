<?php

namespace DeviceKeeperBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * OwnerGroup
 *
 * @ORM\Table(name="owner_group")
 * @ORM\Entity(repositoryClass="DeviceKeeperBundle\Repository\OwnerGroupRepository")
 */
class OwnerGroup
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=48)
     */
    private $description;


    /**
     *
     * @var Owner;
     * 
     * @ORM\ManyToOne ( targetEntity="Owner", inversedBy="groups" )
     * @ORM\JoinColumn ( name="owner_id", referencedColumnName="id", nullable=true )
     */
    private $owner;
    
    /**
     *
     * @var OwnerGroupDevices 
     * 
     * @ORM\OneToMany(targetEntity="OwnerGroupDevice", mappedBy="group", cascade={"persist"})
     * 
     */
    private $devices;
    
    
    public function getOwner(){
        return($this->owner);
    }
    
    public function setOwner(Owner $owner ){
        $this->owner = $owner;
        return($this);
    }


    public function getDevices(){
        return($this->devices);
    }
    
    public function setDevices(ArrayCollection $devices ){
        $this->devices = $devices;
        return($this);
    }

    public function __construct() {
        $this->devices = new ArrayCollection();
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
     * @return OwnerGroup
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
     * Set description
     *
     * @param string $description
     *
     * @return OwnerGroup
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

