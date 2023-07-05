<?php

namespace App\DTO;

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

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function setCircumference(float $circumference): self
    {
        $this->circumference = $circumference;

        return $this;
    }
}