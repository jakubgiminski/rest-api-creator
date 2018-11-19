<?php declare(strict_types=1);

namespace RestApiCreator\Serialization;

interface Serializer
{
    public function serialize(array $data);
}
