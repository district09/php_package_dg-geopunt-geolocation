<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Request;

use DigipolisGent\Geopunt\Geolocation\Filter\Filters;
use DigipolisGent\Geopunt\Geolocation\Filter\NumberOfItemsFilter;
use DigipolisGent\Geopunt\Geolocation\Filter\SearchStringFilter;
use DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest
 */
class SuggestionRequestTest extends TestCase
{
    /**
     * The URI is set.
     *
     * @test
     */
    public function requestUriIsSet(): void
    {
        $filters = new Filters(
            new SearchStringFilter('foobar'),
            new NumberOfItemsFilter(5)
        );

        $request = new SuggestionRequest($filters);

        $this->assertEquals('Suggestion?q=foobar&c=5', $request->getRequestTarget());
    }
}
