<?php

namespace App\DTO;

use App\Enum\ShapeEnum;

readonly class CircleDTO implements ShapeInterface
{
    public function __construct(
        private float $radius
    ) {
    }

    public function getRadius(): float
    {
        return $this->radius;
    }

    public function getType(): ShapeEnum
    {
        return ShapeEnum::CIRCLE;
    }
}