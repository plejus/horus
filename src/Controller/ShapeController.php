<?php

namespace App\Controller;

use App\DTO\CircleDTO;
use App\DTO\TriangleDTO;
use App\Response\ShapeResponse;
use App\Service\Geometry\GeometryFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;

class ShapeController extends AbstractController
{
    public function __construct(private readonly GeometryFactory $geometryFactory)
    {}

    #[Route('/', methods: [Request::METHOD_GET])]
    public function info(KernelInterface $kernel)
    {
        return $this->json([
            'env' => $kernel->getEnvironment(),
            'date' => date(DATE_RFC3339_EXTENDED),
        ]);
    }

    #[Route('/triangle/{sideA}/{sideB}/{sideC}', methods: [Request::METHOD_GET])]
    public function triangle(
        float $sideA,
        float $sideB,
        float $sideC,
    ): JsonResponse {
        $shape = new TriangleDTO($sideA, $sideB, $sideC);

        return $this->json(new ShapeResponse(
            $shape,
            $this->geometryFactory->createGeometry($shape))
        );
    }

    #[Route('/circle/{radius}', methods: [Request::METHOD_GET])]
    public function circle(
        float $radius,
    ): JsonResponse {
        $shape = new CircleDTO($radius);

        return $this->json(new ShapeResponse(
            $shape,
            $this->geometryFactory->createGeometry($shape))
        );
    }

}