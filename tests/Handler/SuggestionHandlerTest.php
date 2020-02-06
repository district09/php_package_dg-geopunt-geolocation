<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Handler;

use DigipolisGent\Geopunt\Geolocation\Handler\SuggestionHandler;
use DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest;
use DigipolisGent\Geopunt\Geolocation\Response\SuggestionResponse;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;
use GuzzleHttp\Psr7\Stream;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Handler\SuggestionHandler
 */
class SuggestionHandlerTest extends TestCase
{
    /**
     * Handler handles SuggestionRequest.
     *
     * @test
     */
    public function handlerHandlesSuggestionRequest(): void
    {
        $handler = new SuggestionHandler();

        $this->assertEquals(
            [SuggestionRequest::class],
            $handler->handles()
        );
    }

    /**
     * To response converts the PSR response into a SuggestionResponse.
     *
     * @test
     */
    public function handlerTransformsResponse(): void
    {
        $stream = $this->prophesize(Stream::class);
        $stream->getContents()->willReturn('{"SuggestionResult":[]}');

        $response = $this->prophesize(ResponseInterface::class);
        $response->getBody()->willReturn($stream->reveal());

        $expected = new SuggestionResponse(new Suggestions());

        $handler = new SuggestionHandler();
        $this->assertEquals($expected, $handler->toResponse($response->reveal()));
    }
}
