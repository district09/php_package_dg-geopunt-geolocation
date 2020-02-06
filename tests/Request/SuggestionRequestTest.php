<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Request;

use DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest;
use DigipolisGent\Geopunt\Geolocation\Value\Lookup;
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
        $lookup = new Lookup('foobar', 5);
        $request = new SuggestionRequest($lookup);

        $this->assertEquals('Suggestion?q=foobar&c=5', $request->getRequestTarget());
    }
}
