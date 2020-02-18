<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value\Position;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * Position containing the WSG84 and Lambert72 point representation.
 */
final class Position extends ValueAbstract
{
    /**
     * The WGS84 point.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point
     */
    private $wgs84;

    /**
     * The Lambert 72 point.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point
     */
    private $lambert72;

    /**
     * Create the value from WGS84 and Lambert72 points.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point $wgs84
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point $lambert72
     */
    public function __construct(Wgs84Point $wgs84, Lambert72Point $lambert72)
    {
        $this->wgs84 = $wgs84;
        $this->lambert72 = $lambert72;
    }

    /**
     * Get the WGS84 coordinates of the point.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Position\Wgs84Point
     */
    public function wgs84(): Wgs84Point
    {
        return $this->wgs84;
    }

    /**
     * Get the Lambert72 coordinates of the point.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Position\Lambert72Point
     */
    public function lambert72(): Lambert72Point
    {
        return $this->lambert72;
    }

    /**
     * @inheritDoc
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \DigipolisGent\Geopunt\Geolocation\Value\Position\Position $object */
        return $this->sameValueTypeAs($object)
            && $this->wgs84()->sameValueAs($object->wgs84())
            && $this->lambert72()->sameValueAs($object->lambert72());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string) $this->wgs84();
    }
}
