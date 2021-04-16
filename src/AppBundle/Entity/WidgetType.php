<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WidgetType
 *
 * @ORM\Table(name="widget_type")
 * @ORM\Entity
 */
class WidgetType
{
    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, nullable=true)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="bundle_alias", type="string", length=255, nullable=true)
     */
    private $bundleAlias;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptor", type="string", length=1000000, nullable=true)
     */
    private $descriptor;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

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
     * @ORM\SequenceGenerator(sequenceName="widget_type_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;



    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return WidgetType
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set bundleAlias
     *
     * @param string $bundleAlias
     *
     * @return WidgetType
     */
    public function setBundleAlias($bundleAlias)
    {
        $this->bundleAlias = $bundleAlias;

        return $this;
    }

    /**
     * Get bundleAlias
     *
     * @return string
     */
    public function getBundleAlias()
    {
        return $this->bundleAlias;
    }

    /**
     * Set descriptor
     *
     * @param string $descriptor
     *
     * @return WidgetType
     */
    public function setDescriptor($descriptor)
    {
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * Get descriptor
     *
     * @return string
     */
    public function getDescriptor()
    {
        return $this->descriptor;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return WidgetType
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
     * Set tenantId
     *
     * @param string $tenantId
     *
     * @return WidgetType
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
