<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value;

use DigipolisGent\Geopunt\Geolocation\Value\Suggestion;
use DigipolisGent\Value\ValueInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Suggestion
 */
class SuggestionTest extends TestCase
{

    /**
     * Suggestion can be created from string.
     *
     * @test
     */
    public function canBeCreatedFromString(): void
    {
        $suggestion = new Suggestion('Bellevue, 9000 Gent');

        $this->assertSame('Bellevue, 9000 Gent', $suggestion->suggestion());
    }

    /**
     * Values are the same if they share the same object type and parameters.
     *
     * @param \DigipolisGent\Value\ValueInterface $value
     *   The value to compare another object with.
     * @param \DigipolisGent\Value\ValueInterface $otherValue
     *   The other object to compare.
     * @param bool $shouldBeTheSame
     *   Should both objects be identified as the same.
     *
     * @dataProvider sameValueProvider
     *
     * @test
     */
    public function sameValueIfSameTypeAndParameters(
        ValueInterface $value,
        ValueInterface $otherValue,
        bool $shouldBeTheSame
    ) {
        $this->assertEquals(
            $shouldBeTheSame,
            $value->sameValueAs($otherValue)
        );
    }

    /**
     * Data provider to test the same value method.
     *
     * @return array
     *   Each record in the array contains:
     *   - Suggestion : The value to compare against.
     *   - Suggestion : The value to compare with.
     *   - bool : Should both values be seen as the same.
     */
    public function sameValueProvider(): array
    {
        return [
            'Not the same if lookup string is different' => [
                new Suggestion('foobar'),
                new Suggestion('fizbaz'),
                false,
            ],
            'The same if lookup strings are the same' => [
                new Suggestion('foobar'),
                new Suggestion('foobar'),
                true,
            ],
        ];
    }

    /**
     * Suggestion is returned as string.
     *
     * @test
     */
    public function castToStringReturnsSuggestion(): void
    {
        $suggestion = new Suggestion('foobar');
        $this->assertSame('foobar', (string) $suggestion);
    }
}
