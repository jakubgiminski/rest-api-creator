<?php declare(strict_types=1);

namespace RestApiCreator\Serialization;

interface Serializable
{
    public function serialize(Serializer $serializer);
}
