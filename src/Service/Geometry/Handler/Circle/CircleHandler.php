<?php

namespace Service\Geometry\Handler\Circle;

use DTO\CircleDTO;
use DTO\ShapeInterface;
use Service\Geometry\Handler\ShapeHandlerInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

class CircleHandler implements ShapeHandlerInterface
{
    /** @var CircleCalculatorInterface[] */
    private iterable $handlers;

    public function __construct(
        #[TaggedIterator('app.service.geometry.handler.circle')]
        iterable $handlers
    ) {
        $this->handlers = $handlers;
    }

    public function supports(ShapeInterface $shape): bool
    {
        return $shape instanceof CircleDTO;
    }

    public function getCalculators(): array
    {
        return $this->handlers;
    }
}