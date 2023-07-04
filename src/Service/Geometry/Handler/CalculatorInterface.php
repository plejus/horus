<?php

namespace App\Service\Geometry\Handler;

use App\DTO\ShapeGeometryDTO;
use App\DTO\ShapeInterface;
use App\Exception\InvalidShapeDimensionException;
use App\Exception\NotATriangleException;

interface CalculatorInterface
{
    /**
     * @param ShapeGeometryDTO $dto
     * @param ShapeInterface   $shape
     * @throws NotATriangleException
     * @throws InvalidShapeDimensionException
     *
     * @return void
     */
    public function calculate(
        ShapeGeometryDTO $dto,
        ShapeInterface $shape
    ): void;
}