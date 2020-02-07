<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Filter;

use DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point;

/**
 * Filter by Lambert72 x-y coordinates.
 */
final class Lambert72Filter extends AbstractFilter
{
    /**
     * Create the filter from Lambert72 Point value.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point $point
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Filter\Lambert72Filter
     */
    public static function fromLambert72Point(Lambert72Point $point): Lambert72Filter
    {
        return new static(
            sprintf('%d,%d', $point->xPosition(), $point->yPosition())
        );
    }

    /**
     * Create the filter from x-y values.
     *
     * @param float $xPosition
     * @param float $yPosition
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Filter\Lambert72Filter
     */
    public static function fromXY(float $xPosition, float $yPosition): Lambert72Filter
    {
        $point = new Lambert72Point($xPosition, $yPosition);
        return static::fromLambert72Point($point);
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'xy';
    }
}
