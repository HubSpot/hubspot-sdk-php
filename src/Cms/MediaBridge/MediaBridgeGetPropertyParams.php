<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for an existing property by name.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::getProperty()
 *
 * @phpstan-type MediaBridgeGetPropertyParamsShape = array{
 *   appID: string,
 *   objectType: string,
 *   archived?: bool|null,
 *   properties?: string|null,
 * }
 */
final class MediaBridgeGetPropertyParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeGetPropertyParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $appID;

    #[Required]
    public string $objectType;

    /**
     * Whether to return only results that have been archived.
     */
    #[Optional]
    public ?bool $archived;

    #[Optional]
    public ?string $properties;

    /**
     * `new MediaBridgeGetPropertyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeGetPropertyParams::with(appID: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeGetPropertyParams)->withAppID(...)->withObjectType(...)
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
        string $appID,
        string $objectType,
        ?bool $archived = null,
        ?string $properties = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['objectType'] = $objectType;

        null !== $archived && $self['archived'] = $archived;
        null !== $properties && $self['properties'] = $properties;

        return $self;
    }

    public function withAppID(string $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

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
