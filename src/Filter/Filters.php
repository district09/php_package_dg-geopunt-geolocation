<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Filter;

/**
 * Collection of filters.
 */
final class Filters implements FiltersInterface
{
    /**
     * The added filters.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Filter\FilterInterface[]
     */
    private $filters;

    /**
     * Create new filters collection from Filter objects.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Filter\FilterInterface ...$filters
     */
    public function __construct(FilterInterface ...$filters)
    {
        $this->filters = $filters;
    }

    /**
     * @inheritDoc
     */
    public function filters(): array
    {
        $filters = [];
        foreach ($this->filters as $filter) {
            $filters[$filter->name()] = $filter->value();
        }

        return $filters;
    }
}
