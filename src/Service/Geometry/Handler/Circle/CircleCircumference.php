<?php

namespace App\Service\Geometry\Handler\Circle;

use App\DTO\CircleDTO;
use App\DTO\ShapeGeometryDTO;
use App\DTO\ShapeInterface;
use App\Exception\InvalidShapeRadiusException;
use App\Exception\ShapeMisconfigurationException;

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