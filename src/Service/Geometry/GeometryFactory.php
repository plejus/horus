<?php

namespace Service\Geometry;

use DTO\ShapeGeometryDTO;
use DTO\ShapeInterface;
use Exception\MissingShapeHandlerException;
use Service\Geometry\Handler\ShapeHandlerInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

readonly class GeometryFactory
{
    /** @var ShapeHandlerInterface[] */
    private iterable $handlers;

    public function __construct(
        #[TaggedIterator('app.service.geometry.handler')]
        iterable $handlers
    ) {
        $this->handlers = $handlers;
    }

    /**
     * @throws MissingShapeHandlerException
     */
    public function createGeometry(ShapeInterface $shape): ShapeGeometryDTO
    {
        foreach ($this->handlers as $handler) {
            if ($handler->supports($shape)) {
                $dto = new ShapeGeometryDTO();

                foreach ($handler->getCalculators() as $calculator) {
                    $calculator->calculate($dto, $shape);
                }

                return $dto;
            }
        }

        throw new MissingShapeHandlerException();
    }
}