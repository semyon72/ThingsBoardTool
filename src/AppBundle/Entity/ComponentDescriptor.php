<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ComponentDescriptor
 *
 * @ORM\Table(name="component_descriptor")
 * @ORM\Entity
 */
class ComponentDescriptor
{
    /**
     * @var string
     *
     * @ORM\Column(name="actions", type="string", length=255, nullable=true)
     */
    private $actions;

    /**
     * @var string
     *
     * @ORM\Column(name="clazz", type="string", nullable=true)
     */
    private $clazz;

    /**
     * @var string
     *
     * @ORM\Column(name="configuration_descriptor", type="string", nullable=true)
     */
    private $configurationDescriptor;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="scope", type="string", length=255, nullable=true)
     */
    private $scope;

    /**
     * @var string
     *
     * @ORM\Column(name="search_text", type="string", length=255, nullable=true)
     */
    private $searchText;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=31)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="component_descriptor_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;



    /**
     * Set actions
     *
     * @param string $actions
     *
     * @return ComponentDescriptor
     */
    public function setActions($actions)
    {
        $this->actions = $actions;

        return $this;
    }

    /**
     * Get actions
     *
     * @return string
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Set clazz
     *
     * @param string $clazz
     *
     * @return ComponentDescriptor
     */
    public function setClazz($clazz)
    {
        $this->clazz = $clazz;

        return $this;
    }

    /**
     * Get clazz
     *
     * @return string
     */
    public function getClazz()
    {
        return $this->clazz;
    }

    /**
     * Set configurationDescriptor
     *
     * @param string $configurationDescriptor
     *
     * @return ComponentDescriptor
     */
    public function setConfigurationDescriptor($configurationDescriptor)
    {
        $this->configurationDescriptor = $configurationDescriptor;

        return $this;
    }

    /**
     * Get configurationDescriptor
     *
     * @return string
     */
    public function getConfigurationDescriptor()
    {
        return $this->configurationDescriptor;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ComponentDescriptor
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
     * Set scope
     *
     * @param string $scope
     *
     * @return ComponentDescriptor
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * Get scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set searchText
     *
     * @param string $searchText
     *
     * @return ComponentDescriptor
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
     * Set type
     *
     * @param string $type
     *
     * @return ComponentDescriptor
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
