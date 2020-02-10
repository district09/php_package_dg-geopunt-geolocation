<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Filter;

use Webmozart\Assert\Assert;

/**
 * Filter to search records by the given string.
 */
final class RestrictByTypeFilter extends AbstractFilter
{
    /**
     * Restrict by municipality name
     *
     * @var string
     */
    public const MUNICIPALITY_NAME = 'Municipality';

    /**
     * Restrict by street name.
     *
     * @var string
     */
    public const STREETNAME = 'Thoroughfarename';

    /**
     * Restrict by house number.
     *
     * @var string
     */
    public const HOUSENUMBER = 'Housenumber';

    /**
     * Create new filter.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        Assert::oneOf(
            $value,
            [static::MUNICIPALITY_NAME, static::STREETNAME, static::HOUSENUMBER]
        );

        parent::__construct($value);
    }

    /**
     * @inheritDoc
     */
    public function name(): string
    {
        return 'type';
    }
}
