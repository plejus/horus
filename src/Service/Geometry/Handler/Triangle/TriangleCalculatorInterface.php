<?php

namespace App\Service\Geometry\Handler\Triangle;

use App\Service\Geometry\Handler\CalculatorInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('app.service.geometry.handler.triangle')]
interface TriangleCalculatorInterface extends CalculatorInterface
{
}