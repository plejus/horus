<?php

namespace Response;

use DTO\ShapeGeometryDTO;
use DTO\ShapeInterface;

readonly class ShapeResponse
{
    public function __construct(
        private ShapeInterface $shape,
        private ShapeGeometryDTO $shapeDimensionsDTO
    ) {
    }

    public function getShape(): ShapeInterface
    {
        return $this->shape;
    }

    public function getShapeDimensionsDTO(): ShapeGeometryDTO
    {
        return $this->shapeDimensionsDTO;
    }
}