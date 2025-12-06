<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations;

use HubspotSDK\Conversations\PublicLocation\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicLocationShape = array{
 *   latitude: float,
 *   longitude: float,
 *   type: value-of<Type>,
 *   address?: string|null,
 *   name?: string|null,
 *   url?: string|null,
 * }
 */
final class PublicLocation implements BaseModel
{
    /** @use SdkModel<PublicLocationShape> */
    use SdkModel;

    #[Api]
    public float $latitude;

    #[Api]
    public float $longitude;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api(optional: true)]
    public ?string $address;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
    public ?string $url;

    /**
     * `new PublicLocation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicLocation::with(latitude: ..., longitude: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicLocation)->withLatitude(...)->withLongitude(...)->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        float $latitude,
        float $longitude,
        Type|string $type = 'LOCATION',
        ?string $address = null,
        ?string $name = null,
        ?string $url = null,
    ): self {
        $obj = new self;

        $obj['latitude'] = $latitude;
        $obj['longitude'] = $longitude;
        $obj['type'] = $type;

        null !== $address && $obj['address'] = $address;
        null !== $name && $obj['name'] = $name;
        null !== $url && $obj['url'] = $url;

        return $obj;
    }

    public function withLatitude(float $latitude): self
    {
        $obj = clone $this;
        $obj['latitude'] = $latitude;

        return $obj;
    }

    public function withLongitude(float $longitude): self
    {
        $obj = clone $this;
        $obj['longitude'] = $longitude;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withAddress(string $address): self
    {
        $obj = clone $this;
        $obj['address'] = $address;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
