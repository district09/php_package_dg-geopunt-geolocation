<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Filter;

/**
 * Limit the number of returned records.
 */
final class NumberOfItemsFilter extends AbstractFilter
{
    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'c';
    }
}
