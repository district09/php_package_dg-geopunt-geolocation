<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value\Position;

use DigipolisGent\Geopunt\Geolocation\Serializer\ToString\Wgs84PointSerializer;
use Webmozart\Assert\Assert;

/**
 * WGS84 representation of a geographical point.
 */
final class Wgs84Point extends AbstractPoint
{
    /**
     * Create a new position object.
     *
     * @param float $xPosition
     * @param float $yPosition
     */
    public function __construct(float $xPosition, float $yPosition)
    {
        Assert::greaterThanEq($xPosition, -180);
        Assert::lessThanEq($xPosition, 180);
        Assert::greaterThanEq($yPosition, -90);
        Assert::lessThanEq($yPosition, 90);

        parent::__construct($xPosition, $yPosition);
    }

    /**
     * @inheritDoc
     *
     * The string will contain "[latititude (y)] [longitude (x)]".
     */
    public function __toString(): string
    {
        return sprintf(
            '%s %s',
            $this->yPosition(),
            $this->xPosition()
        );
    }
}
