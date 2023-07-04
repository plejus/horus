<?php

namespace App\Service\Geometry\Handler;

use App\DTO\ShapeInterface;
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