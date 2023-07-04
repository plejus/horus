<?php

namespace DTO;

class ShapeGeometryDTO
{
    private float $surface = 0;

    private float $circumference = 0;

    public function getSurface(): float
    {
        return $this->surface;
    }

    public function getCircumference(): float
    {
        return $this->circumference;
    }

    public function setSurface(float $surface): void
    {
        $this->surface = $surface;
    }

    public function setCircumference(float $circumference): void
    {
        $this->circumference = $circumference;
    }
}