<?php

namespace App\DTO;

use App\Enum\ShapeEnum;

readonly class TriangleDTO implements ShapeInterface
{
    public function __construct(
        private float $sideA,
        private float $sideB,
        private float $sideC,
    ) {
    }

    public function getSideA(): float
    {
        return $this->sideA;
    }

    public function getSideB(): float
    {
        return $this->sideB;
    }

    public function getSideC(): float
    {
        return $this->sideC;
    }

    public function getType(): ShapeEnum
    {
        return ShapeEnum::CIRCLE;
    }
}