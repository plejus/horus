<?php

namespace App\DTO;

use App\Enum\ShapeEnum;

interface ShapeInterface
{
    public function getType(): ShapeEnum;
}