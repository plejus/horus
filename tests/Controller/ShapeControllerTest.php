<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShapeControllerTest extends WebTestCase
{
    public function testTriangle(): void
    {
        $client = static::createClient();
        $client->request('GET', '/triangle/13/13/24');

        $this->assertResponseIsSuccessful();
        $resp = $client->getResponse()->getContent();

        $this->assertEquals([
            'shape' => [
                'sideA' => 13,
                'sideB' => 13,
                'sideC' => 24,
                'type' => 'circle',
            ],
            'shapeDimensionsDTO' => [
                'surface' => 60,
                'circumference' => 50,
            ]
        ], json_decode($resp, true));
    }

    public function testNotTriangle(): void
    {
        $client = static::createClient();
        $client->request('GET', '/triangle/13/13/500');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testTriangleWrongSide(): void
    {
        $client = static::createClient();
        $client->request('GET', '/triangle/13/13/-1');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testTriangleZeroSide(): void
    {
        $client = static::createClient();
        $client->request('GET', '/triangle/13/0/12');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testCircle(): void
    {
        $client = static::createClient();
        $client->request('GET', '/circle/5');

        $this->assertResponseIsSuccessful();
        $resp = $client->getResponse()->getContent();

        $this->assertEquals([
            'shape' => [
                'radius' => 5,
                'type' => 'circle',
            ],
            'shapeDimensionsDTO' => [
                'surface' => 78.53981633974483,
                'circumference' => 31.41592653589793,
            ]
        ], json_decode($resp, true));
    }

    public function testTriangleZeroRadius(): void
    {
        $client = static::createClient();
        $client->request('GET', '/circle/0');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testTriangleNegativeRadius(): void
    {
        $client = static::createClient();
        $client->request('GET', '/circle/-5');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }
}
