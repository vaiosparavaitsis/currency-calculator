<?php

namespace App\Serializer\Handler;

/**
 * @package App\Serializer
 */
class CircularReferenceHandler
{
    /**
     * @param $object
     * @return mixed
     */
    public function __invoke($object)
    {
        return $object->getId();
    }
}
