<?php declare(strict_types=1);

namespace Serialization;

interface Serializer
{
    public function serialize(array $data);
}

