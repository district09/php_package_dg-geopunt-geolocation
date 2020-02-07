<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Filter;

use DigipolisGent\Geopunt\Geolocation\Filter\NumberOfItemsFilter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Filter\NumberOfItemsFilter
 */
class NumberOfItemsFilterTest extends TestCase
{
    /**
     * Filter has proper argument name.
     *
     * @test
     */
    public function hasProperArgumentName(): void
    {
        $filter = new NumberOfItemsFilter(5);

        $this->assertEquals('c', $filter->name());
    }
}
