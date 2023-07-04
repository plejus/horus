<?php

namespace App\Response;

use App\DTO\ShapeGeometryDTO;
use App\DTO\ShapeInterface;

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