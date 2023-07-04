<?php

namespace App\Service\Geometry\Handler\Triangle;

use App\DTO\ShapeGeometryDTO;
use App\DTO\ShapeInterface;
use App\DTO\TriangleDTO;
use App\Exception\InvalidShapeSideException;
use App\Exception\NotATriangleException;
use App\Exception\ShapeMisconfigurationException;

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
        $checkedVal = $semiPerimeter *
            ($semiPerimeter - $sideA) *
            ($semiPerimeter - $sideB) *
            ($semiPerimeter - $sideC);

        if ($checkedVal <= 0) {
            throw new NotATriangleException();
        }

        return sqrt($checkedVal);
    }
}