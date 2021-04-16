<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plugin
 *
 * @ORM\Table(name="plugin")
 * @ORM\Entity
 */
class Plugin
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
     * @ORM\Column(name="api_token", type="string", length=255, nullable=true)
     */
    private $apiToken;

    /**
     * @var string
     *
     * @ORM\Column(name="plugin_class", type="string", length=255, nullable=true)
     */
    private $pluginClass;

    /**
     * @var string
     *
     * @ORM\Column(name="configuration", type="string", nullable=true)
     */
    private $configuration;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="public_access", type="boolean", nullable=true)
     */
    private $publicAccess;

    /**
     * @var string
     *
     * @ORM\Column(name="search_text", type="string", length=255, nullable=true)
     */
    private $searchText;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=true)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="tenant_id", type="string", length=31, nullable=true)
     */
    private $tenantId;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=31)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="plugin_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;



    /**
     * Set additionalInfo
     *
     * @param string $additionalInfo
     *
     * @return Plugin
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
     * Set apiToken
     *
     * @param string $apiToken
     *
     * @return Plugin
     */
    public function setApiToken($apiToken)
    {
        $this->apiToken = $apiToken;

        return $this;
    }

    /**
     * Get apiToken
     *
     * @return string
     */
    public function getApiToken()
    {
        return $this->apiToken;
    }

    /**
     * Set pluginClass
     *
     * @param string $pluginClass
     *
     * @return Plugin
     */
    public function setPluginClass($pluginClass)
    {
        $this->pluginClass = $pluginClass;

        return $this;
    }

    /**
     * Get pluginClass
     *
     * @return string
     */
    public function getPluginClass()
    {
        return $this->pluginClass;
    }

    /**
     * Set configuration
     *
     * @param string $configuration
     *
     * @return Plugin
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * Get configuration
     *
     * @return string
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Plugin
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set publicAccess
     *
     * @param boolean $publicAccess
     *
     * @return Plugin
     */
    public function setPublicAccess($publicAccess)
    {
        $this->publicAccess = $publicAccess;

        return $this;
    }

    /**
     * Get publicAccess
     *
     * @return boolean
     */
    public function getPublicAccess()
    {
        return $this->publicAccess;
    }

    /**
     * Set searchText
     *
     * @param string $searchText
     *
     * @return Plugin
     */
    public function setSearchText($searchText)
    {
        $this->searchText = $searchText;

        return $this;
    }

    /**
     * Get searchText
     *
     * @return string
     */
    public function getSearchText()
    {
        return $this->searchText;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Plugin
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set tenantId
     *
     * @param string $tenantId
     *
     * @return Plugin
     */
    public function setTenantId($tenantId)
    {
        $this->tenantId = $tenantId;

        return $this;
    }

    /**
     * Get tenantId
     *
     * @return string
     */
    public function getTenantId()
    {
        return $this->tenantId;
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
