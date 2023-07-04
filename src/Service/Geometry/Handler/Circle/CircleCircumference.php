<?php

namespace Service\Geometry\Handler\Circle;

use DTO\CircleDTO;
use DTO\ShapeGeometryDTO;
use DTO\ShapeInterface;
use Exception\InvalidShapeRadiusException;
use Exception\ShapeMisconfigurationException;

class CircleCircumference implements CircleCalculatorInterface
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

        $dto->setCircumference(
            $this->calculateCircleCircumference(
                $shape->getRadius(),
            )
        );
    }

    private function calculateCircleCircumference($radius): float
    {
        if ($radius <= 0) {
            throw new InvalidShapeRadiusException();
        }

        return 2 * pi() * $radius;
    }
}