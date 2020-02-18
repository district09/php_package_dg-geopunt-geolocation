<?php

declare(strict_types=1);

namespace DigipolisGent\Tests\Geopunt\Geolocation\Filter;

use DigipolisGent\Geopunt\Geolocation\Filter\SearchStringFilter;
use PHPUnit\Framework\TestCase;

/**
 * @covers \DigipolisGent\Geopunt\Geolocation\Filter\AbstractFilter
 * @covers \DigipolisGent\Geopunt\Geolocation\Filter\SearchStringFilter
 */
class SearchStringFilterTest extends TestCase
{
    /**
     * The value is passed trough the constructor.
     *
     * @test
     */
    public function valueIsPassedTroughTheConstructor(): void
    {
        $filter = new SearchStringFilter('FooBar');

        $this->assertEquals('FooBar', $filter->value());
    }

    /**
     * Filter has proper argument name.
     *
     * @test
     */
    public function hasProperArgumentName(): void
    {
        $filter = new SearchStringFilter('FooBar');

        $this->assertEquals('q', $filter->name());
    }
}
