<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dashboard
 *
 * @ORM\Table(name="dashboard")
 * @ORM\Entity
 */
class Dashboard
{
    /**
     * @var string
     *
     * @ORM\Column(name="configuration", type="string", length=10000000, nullable=true)
     */
    private $configuration;

    /**
     * @var string
     *
     * @ORM\Column(name="customer_id", type="string", length=31, nullable=true)
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="search_text", type="string", length=255, nullable=true)
     */
    private $searchText;

    /**
     * @var string
     *
     * @ORM\Column(name="tenant_id", type="string", length=31, nullable=true)
     */
    private $tenantId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=31)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dashboard_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;



    /**
     * Set configuration
     *
     * @param string $configuration
     *
     * @return Dashboard
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
     * Set customerId
     *
     * @param string $customerId
     *
     * @return Dashboard
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return string
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set searchText
     *
     * @param string $searchText
     *
     * @return Dashboard
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
     * Set tenantId
     *
     * @param string $tenantId
     *
     * @return Dashboard
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
     * Set title
     *
     * @param string $title
     *
     * @return Dashboard
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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
