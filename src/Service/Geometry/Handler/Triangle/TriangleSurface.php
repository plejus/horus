<?php

namespace Service\Geometry\Handler\Triangle;

use DTO\ShapeGeometryDTO;
use DTO\ShapeInterface;
use DTO\TriangleDTO;
use Exception\InvalidShapeSideException;
use Exception\ShapeMisconfigurationException;

class TriangleSurface implements TriangleCalculatorInterface
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
        $dto->setSurface(
            $this->calculateTriangleSurface(
                $shape->getSideA(),
                $shape->getSideB(),
                $shape->getSideC(),
            )
        );
    }

    private function calculateTriangleSurface($sideA, $sideB, $sideC): float
    {
        if ($sideA <= 0 || $sideB <= 0 || $sideC <= 0) {
            throw new InvalidShapeSideException();
        }

        $semiPerimeter = ($sideA + $sideB + $sideC) / 2;

        return sqrt(
            $semiPerimeter *
            ($semiPerimeter - $sideA) *
            ($semiPerimeter - $sideB) *
            ($semiPerimeter - $sideC)
        );
    }
}