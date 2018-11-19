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

    public function __construct(
        Urid $urid,
        string $name,
        string $description,
        PropertyDefinitionCollection $propertiesDefinitions,
        ResourceParent $parent
    ) {
        $this->urid = $urid;
        $this->name = $name;
        $this->description = $description;
        $this->propertiesDefinitions = $propertiesDefinitions;
        $this->parent = $parent;
    }

    public function serialize(Serializer $serializer)
    {
        return $serializer->serialize([
            'urid' => $this->urid,
            'name' => $this->name,
            'description' => $this->description,
            'properties_definitions' => $this->propertiesDefinitions->serialize($serializer),
            'parent' => $this->parent->serialize($serializer),
        ]);
    }
}
