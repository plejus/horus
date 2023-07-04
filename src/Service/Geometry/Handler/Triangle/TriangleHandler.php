<?php

namespace Service\Geometry\Handler\Triangle;

use DTO\ShapeInterface;
use DTO\TriangleDTO;
use Service\Geometry\Handler\Circle\CircleCalculatorInterface;
use Service\Geometry\Handler\ShapeHandlerInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

class TriangleHandler implements ShapeHandlerInterface
{
    /** @var CircleCalculatorInterface[] */
    private iterable $handlers;

    public function __construct(
        #[TaggedIterator('app.service.geometry.handler.triangle')]
        iterable $handlers
    ) {
        $this->handlers = $handlers;
    }

    public function supports(ShapeInterface $shape): bool
    {
        return $shape instanceof TriangleDTO;
    }

    public function getCalculators(): array
    {
        return $this->handlers;
    }
}