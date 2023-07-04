<?php

namespace App\Service\Geometry\Handler\Triangle;

use App\DTO\ShapeInterface;
use App\DTO\TriangleDTO;
use App\Service\Geometry\Handler\Circle\CircleCalculatorInterface;
use App\Service\Geometry\Handler\ShapeHandlerInterface;
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
        return iterator_to_array($this->handlers);
    }
}