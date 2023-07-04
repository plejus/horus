<?php

namespace Service\Geometry\Handler\Circle;

use DTO\CircleDTO;
use DTO\ShapeGeometryDTO;
use DTO\ShapeInterface;
use Exception\InvalidShapeRadiusException;
use Exception\ShapeMisconfigurationException;

class CircleSurface implements CircleCalculatorInterface
{
    /**
     * @throws ShapeMisconfigurationException
     */
    public function calculate(
        ShapeGeometryDTO $dto,
        ShapeInterface $shape
    ): void {
        if (!($shape instanceof CircleDTO)) {
            throw new ShapeMisconfigurationException();
        }

        $dto->setSurface(
            $this->calculateCircleSurface(
                $shape->getRadius()
            )
        );
    }

    private function calculateCircleSurface($radius): float
    {
        if ($radius <= 0) {
            throw new InvalidShapeRadiusException();
        }

        return pi() * ($radius ** 2);
    }
}