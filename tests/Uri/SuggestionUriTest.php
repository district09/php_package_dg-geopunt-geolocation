<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Uri;

use DigipolisGent\Geopunt\Geolocation\Uri\SuggestionUri;
use DigipolisGent\Geopunt\Geolocation\Value\Lookup;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Uri\SuggestionUri
 */
class SuggestionUriTest extends TestCase
{

    /**
     * URI contains the lookup string and requested amount of results.
     *
     * @test
     */
    public function uriContainsAddressId(): void
    {
        $lookup = new Lookup('bellevue', 5);
        $uri = new SuggestionUri($lookup);

        $this->assertSame('Suggestion?q=bellevue&c=5', $uri->getUri());
    }
}
