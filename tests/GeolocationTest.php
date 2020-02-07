<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation;

use DigipolisGent\API\Client\ClientInterface;
use DigipolisGent\API\Client\Response\ResponseInterface;
use DigipolisGent\Geopunt\Geolocation\Filter\Filters;
use DigipolisGent\Geopunt\Geolocation\Filter\NumberOfItemsFilter;
use DigipolisGent\Geopunt\Geolocation\Filter\SearchStringFilter;
use DigipolisGent\Geopunt\Geolocation\Geolocation;
use DigipolisGent\Geopunt\Geolocation\Request\LocationRequest;
use DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest;
use DigipolisGent\Geopunt\Geolocation\Response\LocationResponse;
use DigipolisGent\Geopunt\Geolocation\Response\SuggestionResponse;
use DigipolisGent\Geopunt\Geolocation\Value\Locations;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;
use InvalidArgumentException;
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
     * An exception is thrown when the given limit is not within the boundaries.
     *
     * @param string $search
     *   The search string.
     * @param int $limit
     *   The limit to search by.
     * @param bool $limitShouldTriggerException
     *   Should the given limit trigger an exception.
     *
     * @dataProvider suggestionsProvider
     *
     * @test
     */
    public function suggestionsCanBeSearchedWithLimit(
        string $search,
        int $limit,
        bool $limitShouldTriggerException
    ): void {
        $filters = new Filters(
            new SearchStringFilter($search),
            new NumberOfItemsFilter($limit)
        );
        $request = new SuggestionRequest($filters);

        $suggestions = new Suggestions();
        $response = new SuggestionResponse($suggestions);

        $client = $this->createClientMock($request, $response);
        $geolocation = new Geolocation($client);

        if ($limitShouldTriggerException) {
            $this->expectException(InvalidArgumentException::class);
        }

        $this->assertSame(
            $suggestions,
            $geolocation->suggestions($search, $limit)
        );
    }

    /**
     * Data provider to test getting the suggestions.
     *
     * @return array
     *   Each row contains:
     *   - string : Search string.
     *   - int : The limit that should trigger the exception.
     *   - bool : Should trigger exception.
     */
    public function suggestionsProvider(): array
    {
        return [
            'Exception when given limit is lower than 1' => [
                'foobar',
                0,
                true,
            ],
            'No exception when given limit is equal to 1' => [
                'foobar',
                1,
                false,
            ],
            'No exception when given limit is equal to 25' => [
                'foobar',
                25,
                false,
            ],
            'Exception when given limit is greater than 25' => [
                'foobar',
                26,
                true,
            ],
        ];
    }

    /**
     * Get location(s) based on the given query and amount.
     *
     * An exception is thrown when the given limit is not within the boundaries.
     *
     * @param string $search
     *   The search string.
     * @param int $limit
     *   The limit to search by.
     * @param bool $limitShouldTriggerException
     *   Should the given limit trigger an exception.
     *
     * @dataProvider locationBySearchProvider
     *
     * @test
     */
    public function locationsCanBeSearchedWithLimit(
        string $search,
        int $limit,
        bool $limitShouldTriggerException
    ): void {
        $filters = new Filters(
            new SearchStringFilter($search),
            new NumberOfItemsFilter($limit)
        );
        $request = new LocationRequest($filters);

        $locations = new Locations();
        $response = new LocationResponse($locations);

        $client = $this->createClientMock($request, $response);
        $geolocation = new Geolocation($client);

        if ($limitShouldTriggerException) {
            $this->expectException(InvalidArgumentException::class);
        }

        $this->assertSame(
            $locations,
            $geolocation->locationsBySearch($search, $limit)
        );
    }

    /**
     * Data provider to test getting the locations by search string.
     *
     * @return array
     *   Each row contains:
     *   - string : Search string.
     *   - int : The limit that should trigger the exception.
     *   - bool : Should trigger exception.
     */
    public function locationBySearchProvider(): array
    {
        return [
            'Exception when given limit is lower than 1' => [
                'foobar',
                0,
                true,
            ],
            'No exception when given limit is equal to 1' => [
                'foobar',
                1,
                false,
            ],
            'No exception when given limit is equal to 5' => [
                'foobar',
                5,
                false,
            ],
            'Exception when given limit is greater than 5' => [
                'foobar',
                6,
                true,
            ],
        ];
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
