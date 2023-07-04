<?php

namespace App\Service\Shape;

use App\DTO\ShapeInterface;
use App\Service\Geometry\GeometryFactory;

readonly class ShapeOperations
{
    public function __construct(private GeometryFactory $geometryFactory) {}

    public function sumSurface(ShapeInterface $shape1, ShapeInterface $shape2): float
    {
        $geo1 = $this->geometryFactory->createGeometry($shape1);
        $geo2 = $this->geometryFactory->createGeometry($shape2);

        return $geo1->getSurface() + $geo2->getSurface();
    }

    public function sumCircumference(ShapeInterface $shape1, ShapeInterface $shape2): float
    {
        $geo1 = $this->geometryFactory->createGeometry($shape1);
        $geo2 = $this->geometryFactory->createGeometry($shape2);

        return $geo1->getCircumference() + $geo2->getCircumference();
    }
}