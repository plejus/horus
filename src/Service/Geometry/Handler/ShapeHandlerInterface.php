<?php

namespace Service\Geometry\Handler;

use DTO\ShapeInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('app.service.geometry.handler')]
interface ShapeHandlerInterface
{
    public function supports(ShapeInterface $shape): bool;

    /**
     * @return CalculatorInterface[]
     */
    public function getCalculators(): array;
}