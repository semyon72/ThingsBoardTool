<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCredentials
 *
 * @ORM\Table(name="user_credentials", uniqueConstraints={@ORM\UniqueConstraint(name="user_credentials_user_id_key", columns={"user_id"}), @ORM\UniqueConstraint(name="user_credentials_activate_token_key", columns={"activate_token"}), @ORM\UniqueConstraint(name="user_credentials_reset_token_key", columns={"reset_token"})})
 * @ORM\Entity
 */
class UserCredentials
{
    /**
     * @var string
     *
     * @ORM\Column(name="activate_token", type="string", length=255, nullable=true)
     */
    private $activateToken;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="reset_token", type="string", length=255, nullable=true)
     */
    private $resetToken;

    /**
     * @var string
     *
     * @ORM\Column(name="user_id", type="string", length=31, nullable=true)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=31)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="user_credentials_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;



    /**
     * Set activateToken
     *
     * @param string $activateToken
     *
     * @return UserCredentials
     */
    public function setActivateToken($activateToken)
    {
        $this->activateToken = $activateToken;

        return $this;
    }

    /**
     * Get activateToken
     *
     * @return string
     */
    public function getActivateToken()
    {
        return $this->activateToken;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return UserCredentials
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return UserCredentials
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set resetToken
     *
     * @param string $resetToken
     *
     * @return UserCredentials
     */
    public function setResetToken($resetToken)
    {
        $this->resetToken = $resetToken;

        return $this;
    }

    /**
     * Get resetToken
     *
     * @return string
     */
    public function getResetToken()
    {
        return $this->resetToken;
    }

    /**
     * Set userId
     *
     * @param string $userId
     *
     * @return UserCredentials
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
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
