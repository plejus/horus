<?php

namespace Service\Geometry\Handler;

use DTO\ShapeGeometryDTO;
use DTO\ShapeInterface;

interface CalculatorInterface
{
    public function calculate(
        ShapeGeometryDTO $dto,
        ShapeInterface $shape
    ): void;
}