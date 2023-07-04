<?php

namespace App\Service\Geometry\Handler;

use App\DTO\ShapeGeometryDTO;
use App\DTO\ShapeInterface;

interface CalculatorInterface
{
    public function calculate(
        ShapeGeometryDTO $dto,
        ShapeInterface $shape
    ): void;
}