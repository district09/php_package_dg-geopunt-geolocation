<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Uri;

use DigipolisGent\Geopunt\Geolocation\Filter\Filters;
use DigipolisGent\Geopunt\Geolocation\Filter\NumberOfItemsFilter;
use DigipolisGent\Geopunt\Geolocation\Filter\SearchStringFilter;
use DigipolisGent\Geopunt\Geolocation\Uri\SuggestionUri;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Uri\AbstractUriWithQuery
 * @covers \DigipolisGent\Geopunt\Geolocation\Uri\SuggestionUri
 */
class SuggestionUriTest extends TestCase
{

    /**
     * URI without filters.
     *
     * @test
     */
    public function uriWithoutFilters(): void
    {
        $uri = new SuggestionUri();
        $this->assertEquals('Suggestion', $uri->getUri());
    }

    /**
     * URI with filters.
     *
     * @test
     */
    public function uriWithFilters(): void
    {
        $filters = new Filters(
            new SearchStringFilter('bellevue'),
            new NumberOfItemsFilter(10)
        );
        $uri = new SuggestionUri($filters);

        $this->assertSame(
            'Suggestion?q=bellevue&c=10',
            $uri->getUri()
        );
    }
}
