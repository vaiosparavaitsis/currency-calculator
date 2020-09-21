<?php

namespace App\Serializer;

/**
 * @package App\Serializer
 */
class DataArraySerializer extends \League\Fractal\Serializer\DataArraySerializer
{
    /**
     * {@inheritDoc}
     */
    public function collection($resourceKey, array $data): array
    {
        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function item($resourceKey, array $data): array
    {
        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function null(): array
    {
        return [];
    }
}
