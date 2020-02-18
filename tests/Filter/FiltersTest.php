<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Filter;

use DigipolisGent\Geopunt\Geolocation\Filter\FilterInterface;
use DigipolisGent\Geopunt\Geolocation\Filter\Filters;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Filter\Filters
 */
class FiltersTest extends TestCase
{
    /**
     * Collection returns filters as array.
     *
     * @test
     */
    public function filtersAreReturnedAsArray(): void
    {
        $filters = new Filters(
            $this->createFilterMock('Biz', 'Foo'),
            $this->createFilterMock('Baz', 123)
        );

        $expected = [
            'Biz' => 'Foo',
            'Baz' => 123,
        ];
        $this->assertEquals($expected, $filters->filters());
    }

    /**
     * Create filter mock.
     *
     * @param string $name
     * @param mixed $value
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Filter\FilterInterface
     */
    private function createFilterMock(string $name, $value): FilterInterface
    {
        $filter = $this->prophesize(FilterInterface::class);
        $filter->name()->willReturn($name);
        $filter->value()->willReturn($value);

        return $filter->reveal();
    }
}
