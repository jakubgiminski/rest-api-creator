<?php declare(strict_types=1);

namespace RestApiCreator\Resource;

use RestApiCreator\Serialization\Serializable;
use RestApiCreator\Serialization\Serializer;

class Resource extends ResourceDefinition implements Serializable
{
    private $properties;

    protected function __construct(
        Urid $urid,
        string $name,
        string $description,
        PropertyDefinitionCollection $propertiesDefinitions,
        PropertyCollection $properties,
        ResourceParent $parent = null
    ) {
        parent::__construct($urid, $name, $description, $propertiesDefinitions, $parent);
        $this->properties = $properties;
    }

    public static function create(ResourceDefinition $resourceDefinition, PropertyCollection $properties): self
    {
        $resourceDefinition->validateProperties($properties);

        return new self(
            $resourceDefinition->getUrid(),
            $resourceDefinition->getName(),
            $resourceDefinition->getDescription(),
            $resourceDefinition->getPropertiesDefinitions(),
            $properties,
            $resourceDefinition->getParent()
        );
    }

    public function serialize(Serializer $serializer)
    {
        return $this->properties->serialize($serializer);
    }
}
