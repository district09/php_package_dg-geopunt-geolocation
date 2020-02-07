<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value\Position;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * Bounding box contains the rectangle presentation of a location.
 */
final class BoundingBox extends ValueAbstract
{
    /**
     * The lower left position of the bounding box.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Position\Position
     */
    private $lowerLeft;

    /**
     * The upper right position of the bounding box.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Position\Position
     */
    private $upperRight;

    /**
     * Create the value from lower left and upper right position.
     *
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\Position $lowerLeft
     * @param \DigipolisGent\Geopunt\Geolocation\Value\Position\Position $upperRight
     */
    public function __construct(Position $lowerLeft, Position $upperRight)
    {
        $this->lowerLeft = $lowerLeft;
        $this->upperRight = $upperRight;
    }

    /**
     * Get the lower left position.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Position\Position
     */
    public function lowerLeft(): Position
    {
        return $this->lowerLeft;
    }

    /**
     * Get the upper right position.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Position\Position
     */
    public function upperRight(): Position
    {
        return $this->upperRight;
    }

    /**
     * @inheritDoc
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox $object */
        return $this->sameValueTypeAs($object)
            && $this->lowerLeft()->sameValueAs($object->lowerLeft())
            && $this->upperRight()->sameValueAs($object->upperRight());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return sprintf('%s' . PHP_EOL . '%s', $this->lowerLeft(), $this->upperRight());
    }
}
