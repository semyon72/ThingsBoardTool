<?php

namespace DeviceKeeperBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Owner
 *
 * @ORM\Table(name="owner")
 * @ORM\Entity(repositoryClass="DeviceKeeperBundle\Repository\OwnerRepository")
 */
class Owner implements UserInterface
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=48)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="OwnerGroup", mappedBy="owner", cascade={"persist"} )
     */
    private $groups;

    
    public function __construct() {
        $this->groups = new ArrayCollection();
    }
    


    public function setGroups(ArrayCollection $groups){
        $this->groups = $groups;
        return($this);
    }

    
    public function getGroups(){
        return($this->groups);
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
     * Set description
     *
     * @param string $description
     *
     * @return Owner
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

    public function eraseCredentials() {
        
    }

    public function getPassword() {
        return '111';
        
    }

    public function getRoles() {
        return(array('ROLE_DEVICE_KEEPER_USER'));
    }

    public function getSalt() {
        return(null);
    }

    public function getUsername() {
        return($this->getDescription());
    }

}

