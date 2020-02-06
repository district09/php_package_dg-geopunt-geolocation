<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value;

use DigipolisGent\Geopunt\Geolocation\Value\Suggestion;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Suggestions
 */
class SuggestionsTest extends TestCase
{
    /**
     * Casting to string returns all suggestions separated by a semicolon.
     *
     * @test
     */
    public function castToStringReturnsAllSuggestionsSeparatedBySemicolon(): void
    {
        $suggestions = new Suggestions(
            new Suggestion('9000 Gent'),
            new Suggestion('Bellevue 1, 9000 Gent')
        );

        $this->assertEquals(
            '9000 Gent;Bellevue 1, 9000 Gent',
            (string) $suggestions
        );
    }
}
