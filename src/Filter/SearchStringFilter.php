<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Filter;

final class SearchStringFilter extends AbstractFilter
{
    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'q';
    }
}
