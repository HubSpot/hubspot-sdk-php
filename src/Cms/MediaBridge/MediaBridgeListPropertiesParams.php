<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get the existing properties defined for a media object type.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::listProperties()
 *
 * @phpstan-type MediaBridgeListPropertiesParamsShape = array{
 *   appID: int, archived?: bool|null, properties?: string|null
 * }
 */
final class MediaBridgeListPropertiesParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeListPropertiesParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?string $properties;

    /**
     * `new MediaBridgeListPropertiesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeListPropertiesParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeListPropertiesParams)->withAppID(...)
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
     */
    public static function with(
        int $appID,
        ?bool $archived = null,
        ?string $properties = null
    ): self {
        $self = new self;

        $self['appID'] = $appID;

        null !== $archived && $self['archived'] = $archived;
        null !== $properties && $self['properties'] = $properties;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * Whether to return only results that have been archived.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    public function withProperties(string $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
