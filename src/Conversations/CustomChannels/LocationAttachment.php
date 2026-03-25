<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\CustomChannels;

use HubspotSDK\Conversations\CustomChannels\LocationAttachment\Type;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type LocationAttachmentShape = array{
 *   latitude: float,
 *   longitude: float,
 *   type: Type|value-of<Type>,
 *   address?: string|null,
 *   name?: string|null,
 *   url?: string|null,
 * }
 */
final class LocationAttachment implements BaseModel
{
    /** @use SdkModel<LocationAttachmentShape> */
    use SdkModel;

    #[Required]
    public float $latitude;

    #[Required]
    public float $longitude;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Optional]
    public ?string $address;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $url;

    /**
     * `new LocationAttachment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LocationAttachment::with(latitude: ..., longitude: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LocationAttachment)->withLatitude(...)->withLongitude(...)->withType(...)
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
        $self = new self;

        $self['latitude'] = $latitude;
        $self['longitude'] = $longitude;
        $self['type'] = $type;

        null !== $address && $self['address'] = $address;
        null !== $name && $self['name'] = $name;
        null !== $url && $self['url'] = $url;

        return $self;
    }

    public function withLatitude(float $latitude): self
    {
        $self = clone $this;
        $self['latitude'] = $latitude;

        return $self;
    }

    public function withLongitude(float $longitude): self
    {
        $self = clone $this;
        $self['longitude'] = $longitude;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
