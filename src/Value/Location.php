<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value;

use DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox;
use DigipolisGent\Geopunt\Geolocation\Value\Position\Position;
use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;

/**
 * A location.
 */
final class Location extends ValueAbstract implements LocationInterface
{
    /**
     * The location ID.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\LocationId
     */
    private $locationId;

    /**
     * The location type.
     *
     * @var string
     */
    private $type;

    /**
     * The location address.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Address
     */
    private $address;

    /**
     * The geographical position.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Position\Position
     */
    private $position;

    /**
     * The geographical bounding box.
     *
     * @var \DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox
     */
    private $boundingBox;

    /**
     * Create the location from its details.
     */
    public function __construct(
        LocationId $locationId,
        string $type,
        Address $address,
        Position $position,
        BoundingBox $boundingBox
    ) {
        $this->locationId = $locationId;
        $this->type = $type;
        $this->address = $address;
        $this->position = $position;
        $this->boundingBox = $boundingBox;
    }

    /**
     * Get the location ID.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\LocationId
     */
    public function id(): LocationId
    {
        return $this->locationId;
    }

    /**
     * Get the location type.
     *
     * @return string
     */
    public function type(): string
    {
        return $this->type;
    }

    /**
     * Get the location address.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Address
     */
    public function address(): Address
    {
        return $this->address;
    }

    /**
     * Get the formatted address.
     *
     * @return string
     */
    public function addressFormatted(): string
    {
        return (string) $this->address();
    }

    /**
     * Get the location geographical position (point).
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Position\Position
     */
    public function position(): Position
    {
        return $this->position;
    }

    /**
     * Get the location geographical bounding box.
     *
     * @return \DigipolisGent\Geopunt\Geolocation\Value\Position\BoundingBox
     */
    public function boundingBox(): BoundingBox
    {
        return $this->boundingBox;
    }

    /**
     * @inheritDoc
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \DigipolisGent\Geopunt\Geolocation\Value\Location $object */
        return $this->sameValueTypeAs($object)
            && $this->id()->sameValueAs($object->id())
            && $this->type() === $object->type()
            && $this->address()->sameValueAs($object->address())
            && $this->position()->sameValueAs($object->position())
            && $this->boundingBox()->sameValueAs($object->boundingBox());
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->addressFormatted();
    }
}
