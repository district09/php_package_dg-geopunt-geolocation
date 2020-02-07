<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value\Position;

use DigipolisGent\Value\ValueInterface;

/**
 * Interface to represent a geographical point.
 */
interface PointInterface extends ValueInterface
{
    /**
     * Get the x position.
     *
     * @return float
     */
    public function xPosition(): float;

    /**
     * Get the y position.
     *
     * @return float
     */
    public function yPosition(): float;
}
