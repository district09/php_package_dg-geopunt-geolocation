<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation;

use DigipolisGent\API\Service\ServiceAbstract;
use DigipolisGent\Geopunt\Geolocation\Filter\Filters;
use DigipolisGent\Geopunt\Geolocation\Filter\Lambert72Filter;
use DigipolisGent\Geopunt\Geolocation\Filter\NumberOfItemsFilter;
use DigipolisGent\Geopunt\Geolocation\Filter\RestrictByTypeFilter;
use DigipolisGent\Geopunt\Geolocation\Filter\SearchStringFilter;
use DigipolisGent\Geopunt\Geolocation\Filter\Wgs84Filter;
use DigipolisGent\Geopunt\Geolocation\Request\LocationRequest;
use DigipolisGent\Geopunt\Geolocation\Request\SuggestionRequest;
use DigipolisGent\Geopunt\Geolocation\Value\Locations;
use DigipolisGent\Geopunt\Geolocation\Value\Suggestions;
use Webmozart\Assert\Assert;

/**
 * API wrapper to access the geolocation service methods.
 */
final class Geolocation extends ServiceAbstract implements GeolocationInterface
{
    /**
     * @inheritDoc
     */
    public function suggestions(string $search, int $limit): Suggestions
    {
        $this->limitIsWithinBoundaries($limit, 25);

        $filters = new Filters(
            new SearchStringFilter($search),
            new NumberOfItemsFilter($limit)
        );
        $request = new SuggestionRequest($filters);

        /** @var \DigipolisGent\Geopunt\Geolocation\Response\SuggestionResponse $response */
        $response = $this->client()->send($request);
        return $response->suggestions();
    }

    /**
     * @inheritDoc
     */
    public function locationsBySearch(string $search, int $limit, ?string $restrictByType = null): Locations
    {
        $this->limitIsWithinBoundaries($limit, 5);

        $filters = [
            new SearchStringFilter($search),
            new NumberOfItemsFilter($limit),
        ];
        if ($restrictByType) {
            $filters[] = new RestrictByTypeFilter($restrictByType);
        }

        $request = new LocationRequest(new Filters(...$filters));

        /** @var \DigipolisGent\Geopunt\Geolocation\Response\LocationResponse $response */
        $response = $this->client()->send($request);
        return $response->locations();
    }

    /**
     * @inheritDoc
     */
    public function locationsByLatitudeLongitude(
        float $latitude,
        float $longitude,
        int $limit
    ): Locations {
        $this->limitIsWithinBoundaries($limit, 5);

        $filters = new Filters(
            Wgs84Filter::fromLatitudeLongitude($latitude, $longitude),
            new NumberOfItemsFilter($limit)
        );
        $request = new LocationRequest($filters);

        /** @var \DigipolisGent\Geopunt\Geolocation\Response\LocationResponse $response */
        $response = $this->client()->send($request);
        return $response->locations();
    }

    /**
     * @inheritDoc
     */
    public function locationsByXY(
        float $xPosition,
        float $yPosition,
        int $limit
    ): Locations {
        $this->limitIsWithinBoundaries($limit, 5);

        $filters = new Filters(
            Lambert72Filter::fromXY($xPosition, $yPosition),
            new NumberOfItemsFilter($limit)
        );
        $request = new LocationRequest($filters);

        /** @var \DigipolisGent\Geopunt\Geolocation\Response\LocationResponse $response */
        $response = $this->client()->send($request);
        return $response->locations();
    }

    /**
     * Helper to check the limit value.
     *
     * @param int $limit
     *   The limit value to check.
     * @param int $max
     *   The maximum boundary (inclusive).
     *
     * @throws \InvalidArgumentException
     */
    private function limitIsWithinBoundaries(int $limit, int $max): void
    {
        Assert::greaterThan($limit, 0);
        Assert::lessThanEq($limit, $max);
    }
}
