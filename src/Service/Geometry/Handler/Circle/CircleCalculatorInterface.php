<?php

namespace App\Service\Geometry\Handler\Circle;

use App\Service\Geometry\Handler\CalculatorInterface;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('app.service.geometry.handler.circle')]
interface CircleCalculatorInterface extends CalculatorInterface
{
}