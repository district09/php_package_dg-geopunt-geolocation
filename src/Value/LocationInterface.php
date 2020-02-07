<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value;

use DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Position;
use DigipolisGent\Value\ValueInterface;

/**
 * A location.
 */
interface LocationInterface extends ValueInterface
{
    /**
     * Get the location ID.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\LocationId
     */
    public function id(): LocationId;

    /**
     * Get the location type.
     *
     * @return string
     */
    public function type(): string;

    /**
     * Get the location address.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Address
     */
    public function address(): Address;

    /**
     * Get the formatted address.
     *
     * @return string
     */
    public function addressFormatted(): string;

    /**
     * Get the location geographical position (point).
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Position\Position
     */
    public function position(): Position;

    /**
     * Get the location geographical bounding box.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox
     */
    public function boundingBox(): BoundingBox;
}
