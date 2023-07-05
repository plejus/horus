<?php

namespace App\Tests\Service\Shape;

use App\DTO\CircleDTO;
use App\DTO\ShapeGeometryDTO;
use App\DTO\ShapeInterface;
use App\DTO\TriangleDTO;
use App\Service\Geometry\GeometryFactory;
use App\Service\Shape\ShapeOperations;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;

class ShapeOperationsTest extends MockeryTestCase
{
    /**
     * @dataProvider shapeSet
     */
    public function testSumSurface(
        ShapeInterface $s1,
        ShapeInterface $s2,
        ShapeGeometryDTO $g1,
        ShapeGeometryDTO $g2,
    ): void
    {
        $g1->setSurface(10);
        $g2->setSurface(5);

        $geo = $this->mockGeometry($s1, $s2, $g1, $g2);

        $testObject = new ShapeOperations($geo);

        $this->assertEquals(15, $testObject->sumSurface($s1, $s2));
    }

    /**
     * @dataProvider shapeSet
     */
    public function testSumCircumference(
        ShapeInterface $s1,
        ShapeInterface $s2,
        ShapeGeometryDTO $g1,
        ShapeGeometryDTO $g2,
    ): void
    {
        $g1->setCircumference(123);
        $g2->setCircumference(7);

        $geo = $this->mockGeometry($s1, $s2, $g1, $g2);

        $testObject = new ShapeOperations($geo);

        $this->assertEquals(130, $testObject->sumCircumference($s1, $s2));
    }

    public function shapeSet(): array
    {
        $s1 = new TriangleDTO(2, 4, 5);
        $s2 = new CircleDTO(6);
        $g1 = new ShapeGeometryDTO();
        $g2 = new ShapeGeometryDTO();

        return [[$s1, $s2, $g1, $g2]];
    }

    private function mockGeometry(
        ShapeInterface $s1,
        ShapeInterface $s2,
        ShapeGeometryDTO $g1,
        ShapeGeometryDTO $g2,
    ): MockInterface|GeometryFactory
    {
        $geometry = \Mockery::mock(GeometryFactory::class);
        $geometry->shouldReceive('createGeometry')
            ->once()
            ->with($s1)
            ->andReturn($g1);
        $geometry->shouldReceive('createGeometry')
            ->once()
            ->with($s2)
            ->andReturn($g2);

        return $geometry;
    }
}