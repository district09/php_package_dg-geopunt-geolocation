<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Filter;

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
