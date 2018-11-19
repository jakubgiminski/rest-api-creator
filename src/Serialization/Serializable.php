<?php declare(strict_types=1);

namespace Serialization;

interface Serializable
{
    public function serialize(Serializer $serializer);
}
