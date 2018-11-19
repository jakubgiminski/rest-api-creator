<?php declare(strict_types=1);

namespace RestApiCreator\Resource;

use RestApiCreator\Serialization\Serializable;
use RestApiCreator\Serialization\Serializer;

class ResourceDefinition implements Serializable
{
    private $urid;

    private $name;

    private $description;

    private $propertiesDefinitions;

    private $parent;

    protected function __construct(
        Urid $urid,
        string $name,
        string $description,
        PropertyDefinitionCollection $propertiesDefinitions,
        ResourceParent $parent = null
    ) {
        $this->urid = $urid;
        $this->name = $name;
        $this->description = $description;
        $this->propertiesDefinitions = $propertiesDefinitions;
        $this->parent = $parent;
    }

    public function validateProperties(PropertyCollection $properties): void
    {
        // @todo
    }

    public function serialize(Serializer $serializer)
    {
        return $serializer->serialize([
            'urid' => $this->urid,
            'name' => $this->name,
            'description' => $this->description,
            'properties_definitions' => $this->propertiesDefinitions->serialize($serializer),
            'parent' => $this->hasParent() ? $this->parent->serialize($serializer) : null,
        ]);
    }

    public function getUrid(): Urid
    {
        return $this->urid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPropertiesDefinitions(): PropertyDefinitionCollection
    {
        return $this->propertiesDefinitions;
    }

    public function hasParent(): bool
    {
        return $this->parent !== null;
    }

    public function getParent(): ResourceParent
    {
        return $this->parent;
    }
}
