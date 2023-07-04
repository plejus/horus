<?php

namespace Service\Geometry\Handler\Triangle;

use DTO\ShapeGeometryDTO;
use DTO\ShapeInterface;
use DTO\TriangleDTO;
use Exception\InvalidShapeSideException;
use Exception\ShapeMisconfigurationException;

class TriangleCircumference implements TriangleCalculatorInterface
{
    /**
     * @throws ShapeMisconfigurationException
     */
    public function calculate(
        ShapeGeometryDTO $dto,
        ShapeInterface $shape
    ): void {
        if (!($shape instanceof TriangleDTO)) {
            throw new ShapeMisconfigurationException();
        }
        $dto->setCircumference(
            $this->calculateTriangleCircumference(
                $shape->getSideA(),
                $shape->getSideB(),
                $shape->getSideC(),
            )
        );
    }

    private function calculateTriangleCircumference(
        $sideA,
        $sideB,
        $sideC
    ): float {
        if ($sideA <= 0 || $sideB <= 0 || $sideC <= 0) {
            throw new InvalidShapeSideException();
        }

        return $sideA + $sideB + $sideC;
    }
}