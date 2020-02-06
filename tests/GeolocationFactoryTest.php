<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Service;

use DigipolisGent\API\Client\ClientInterface;
use DigipolisGent\Geopunt\Geolocation\Geolocation;
use DigipolisGent\Geopunt\Geolocation\GeolocationFactory;
use DigipolisGent\Geopunt\Geolocation\Handler\SuggestionHandler;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\GeolocationFactory
 */
class GeolocationFactoryTest extends TestCase
{
    /**
     * The factored client contains all handlers.
     *
     * @test
     */
    public function factoredClientContainsAllHandlers(): void
    {
        $clientMock = $this->prophesize(ClientInterface::class);
        $clientMock
            ->addHandler(new SuggestionHandler())
            ->shouldBeCalled();
        $client = $clientMock->reveal();

        $factory = new GeolocationFactory();

        $expected = new Geolocation($client);
        $this->assertEquals($expected, $factory->create($client));
    }
}
