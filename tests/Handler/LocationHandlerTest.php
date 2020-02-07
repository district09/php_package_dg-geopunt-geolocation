<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Handler;

use DigipolisGent\Geopunt\Geolocation\Handler\LocationHandler;
use DigipolisGent\Geopunt\Geolocation\Request\LocationRequest;
use DigipolisGent\Geopunt\Geolocation\Response\LocationResponse;
use DigipolisGent\Geopunt\Geolocation\Value\Locations;
use GuzzleHttp\Psr7\Stream;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Handler\LocationHandler
 */
class LocationHandlerTest extends TestCase
{
    /**
     * Handler handles SuggestionRequest.
     *
     * @test
     */
    public function handlerHandlesSuggestionRequest(): void
    {
        $handler = new LocationHandler();

        $this->assertEquals(
            [LocationRequest::class],
            $handler->handles()
        );
    }

    /**
     * To response converts the PSR response into a LocationResponse.
     *
     * @test
     */
    public function handlerTransformsResponse(): void
    {
        $stream = $this->prophesize(Stream::class);
        $stream->getContents()->willReturn('{"LocationResult":[]}');

        $response = $this->prophesize(ResponseInterface::class);
        $response->getBody()->willReturn($stream->reveal());

        $expected = new LocationResponse(new Locations());

        $handler = new LocationHandler();
        $this->assertEquals($expected, $handler->toResponse($response->reveal()));
    }
}
