<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Uri;

use DigipolisGent\API\Client\Uri\UriInterface;
use DigipolisGent\Geopunt\Geolocation\Filter\FiltersInterface;

/**
 * Abstract URI with support for Filters & Pager.
 */
abstract class AbstractUriWithQuery implements UriInterface
{
    /**
     * The request query parameters.
     *
     * @var array
     */
    private $query;

    /**
     * Create a new URI from given filters.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Filter\FiltersInterface|null $filters
     *   Optional filters to limit the list by.
     */
    public function __construct(?FiltersInterface $filters = null)
    {
        $this->query = $filters ? $filters->filters() : [];
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->addQueryString($this->getPath());
    }

    /**
     * Get the base path (without query parameters) for the URI.
     *
     * @return string
     */
    abstract protected function getPath(): string;

    /**
     * Helper to add the query string to the URI.
     *
     * @param string $uri
     *
     * @return string
     */
    protected function addQueryString(string $uri): string
    {
        if (!$this->query) {
            return $uri;
        }

        return sprintf(
            '%s?%s',
            $uri,
            http_build_query($this->query)
        );
    }
}
