<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Filter;

use DigipolisGent\Geopunt\Geolocation\Filter\RestrictByTypeFilter;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Filter\RestrictByTypeFilter
 */
class RestrictByTypeFilterTest extends TestCase
{
    /**
     * Only valid values are allowed.
     *
     * @param string $type
     *   The type to test with.
     * @param bool $shouldTriggerException
     *   Should the given value trigger an exception.
     *
     * @dataProvider valueProvider
     *
     * @test
     */
    public function onlySupportedTypesAreAllowed(string $type, bool $shouldTriggerException): void
    {
        if ($shouldTriggerException) {
            $this->expectException(InvalidArgumentException::class);
        }

        $filter = new RestrictByTypeFilter($type);

        $this->assertEquals($type, $filter->value());
    }

    /**
     * Data provider to test creating the filter.
     *
     * @return array
     *   Rows containing:
     *   - string : The value to test with.
     *   - bool : Should the value trigger an exception.
     */
    public function valueProvider(): array
    {
        return [
            'Not supported type triggers exception' => [
                'foobar',
                true,
            ],
            'Restrict by Municipality name' => [
                RestrictByTypeFilter::MUNICIPALITY_NAME,
                false,
            ],
            'Restrict by Street name' => [
                RestrictByTypeFilter::STREETNAME,
                false,
            ],
            'Restrict by House number' => [
                RestrictByTypeFilter::HOUSENUMBER,
                false,
            ],
        ];
    }

    /**
     * Filter has proper argument name.
     *
     * @test
     */
    public function hasProperArgumentName(): void
    {
        $filter = new RestrictByTypeFilter(RestrictByTypeFilter::MUNICIPALITY_NAME);

        $this->assertEquals('type', $filter->name());
    }
}
