<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation;

use DigipolisGent\API\Client\ClientInterface;
use DigipolisGent\API\Client\Response\ResponseInterface;
use DigipolisGent\Geopunt\Geolocation\Geolocation;
use DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest;
use DigipolisGent\Geopunt\Geolocation\Response\SuggestionResponse;
use DigipolisGent\Geopunt\Geolocation\Value\Lookup;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Geolocation
 */
class GeolocationTest extends TestCase
{
    /**
     * Get suggestions based on the given query and amount.
     *
     * @test
     */
    public function suggestionsAreLookedUpAndReturned(): void
    {
        $lookup = new Lookup('foobar', 6);
        $request = new SuggestionRequest($lookup);

        $suggestions = new Suggestions();
        $response = new SuggestionResponse($suggestions);

        $client = $this->createClientMock($request, $response);
        $geolocation = new Geolocation($client);

        $this->assertSame(
            $suggestions,
            $geolocation->suggestions('foobar', 6)
        );
    }

    /**
     * Create a client mock.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     * @param \DigipolisGent\API\Client\Response\ResponseInterface $response
     *
     * @return \DigipolisGent\API\Client\ClientInterface
     */
    private function createClientMock(RequestInterface $request, ResponseInterface $response): ClientInterface
    {
        $client = $this->prophesize(ClientInterface::class);
        $client->send($request)->willReturn($response);

        return $client->reveal();
    }
}
