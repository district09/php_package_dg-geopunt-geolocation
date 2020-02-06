<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Value;

use DigipolisGent\Geopunt\Geolocation\Value\Lookup;
use DigipolisGent\Value\ValueInterface;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Value\Lookup
 */
class LookupTest extends TestCase
{

    /**
     * Lookup can be created from query and amount.
     *
     * @test
     */
    public function canBeCreatedFromQueryAndAmount(): void
    {
        $lookup = new Lookup('foobar', 123);

        $this->assertSame('foobar', $lookup->query());
        $this->assertSame(123, $lookup->amount());
    }

    /**
     * Exception is thrown when amount is not greater than 0.
     *
     * @param int $amount
     *   The amount to test with.
     * @param bool $expectException
     *   Should the amount trigger an exception.
     *
     * @dataProvider amountProvider
     *
     * @test
     */
    public function amountShouldBeGreaterThanZero(int $amount, bool $expectException): void
    {
        if ($expectException) {
            $this->expectException(InvalidArgumentException::class);
        }

        new Lookup('foobar', $amount);
        $this->assertFalse($expectException, 'Amount dit not trigger an exception.');
    }

    /**
     * Data provider to test the amount assertion.
     *
     * @return array
     *   Each record in the array contains:
     *   - int : The amount to test with.
     *   - bool : Should the code trigger an exception.
     */
    public function amountProvider(): array
    {
        return [
            'Value lower than 0 is not ok' => [-1, true],
            'Value equal to 0 is not ok' => [0, true],
            'Value greater than 0 is ok' => [1, false],
        ];
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
     *   - Lookup : The value to compare against.
     *   - Lookup : The value to compare with.
     *   - bool : Should both values be seen as the same.
     */
    public function sameValueProvider(): array
    {
        return [
            'Not the same if query is different' => [
                new Lookup('foobar', 5),
                new Lookup('bizbaz', 5),
                false,
            ],
            'Not the same if amount is different' => [
                new Lookup('foobar', 5),
                new Lookup('foobar', 6),
                false,
            ],
            'The same if query and amount are same' => [
                new Lookup('foobar', 5),
                new Lookup('foobar', 5),
                true,
            ],
        ];
    }

    /**
     * Query is returned as string.
     *
     * @test
     */
    public function castToStringReturnsQuery(): void
    {
        $lookup = new Lookup('foobar', 5);
        $this->assertSame('foobar', (string) $lookup);
    }
}
