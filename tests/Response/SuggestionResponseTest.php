<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Response;

use DigipolisGent\Geopunt\Geolocation\Response\SuggestionResponse;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Response\SuggestionResponse
 */
class SuggestionResponseTest extends TestCase
{
    /**
     * Response is created with Suggestions collection.
     *
     * @test
     */
    public function responseHasSuggestionsCollection(): void
    {
        $suggestions = new Suggestions();
        $response = new SuggestionResponse($suggestions);

        $this->assertSame($suggestions, $response->suggestions());
    }
}
