<?php

declare(strict_types=1);

namespace DigipolisGent\Geopunt\Geolocation\Value;

use DigipolisGent\Value\ValueAbstract;
use DigipolisGent\Value\ValueInterface;
use Webmozart\Assert\Assert;

/**
 * The location id.
 */
final class LocationId extends ValueAbstract
{
    /**
     * The location id.
     *
     * @var int
     */
    private $locationId;

    /**
     * Create a new Location Id from its integer value.
     *
     * @param int $locationId
     *   The id value.
     */
    public function __construct(int $locationId)
    {
        Assert::greaterThan($locationId, 0);
        $this->locationId = $locationId;
    }

    /**
     * Get the id value.
     *
     * @return int
     */
    public function value(): int
    {
        return $this->locationId;
    }

    /**
     * @inheritDoc
     */
    public function sameValueAs(ValueInterface $object): bool
    {
        /** @var \DigipolisGent\Geopunt\Geolocation\Value\LocationId $object */
        return $this->sameValueTypeAs($object)
            && $this->value() === $object->value();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return (string) $this->value();
    }
}
