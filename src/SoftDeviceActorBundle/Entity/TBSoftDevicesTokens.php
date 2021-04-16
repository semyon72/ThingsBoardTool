<?php

namespace SoftDeviceActorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TBSoftDevicesTokens
 *
 * @ORM\Table(name="tb_softdevices_tokens")
 * @ORM\Entity(repositoryClass="SoftDeviceActorBundle\Repository\TBSoftDevicesTokensRepository")
 */
class TBSoftDevicesTokens
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
     * @ORM\Column(name="tb_id", type="string", length=48)
     */
    private $tb_id;

    /**
     * @var string
     *
     * @ORM\Column(name="tb_token", type="string", length=48)
     */
    private $tb_token;


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
     * Set tbId
     *
     * @param string $tbId
     *
     * @return TBSoftDevicesTokens
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
     * Set tbToken
     *
     * @param string $tbToken
     *
     * @return TBSoftDevicesTokens
     */
    public function setTbToken($tbToken)
    {
        $this->tb_token = $tbToken;

        return $this;
    }

    /**
     * Get tbToken
     *
     * @return string
     */
    public function getTbToken()
    {
        return $this->tb_token;
    }
}

