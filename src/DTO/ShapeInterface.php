<?php

namespace DTO;

use Enum\ShapeEnum;

interface ShapeInterface
{
    public function getType(): ShapeEnum;
}