<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Filter;

use DigipolisGent\Geopunt\Geolocation\Filter\LocationTypeFilter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Filter\LocationTypeFilter
 */
class LocationTypeFilterTest extends TestCase
{
    /**
     * Filter has proper argument name.
     *
     * @test
     */
    public function hasProperArgumentName(): void
    {
        $filter = new LocationTypeFilter('FooBar');

        $this->assertEquals('type', $filter->name());
    }
}
