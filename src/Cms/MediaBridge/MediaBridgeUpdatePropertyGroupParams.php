<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Update an existing property group by name.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::updatePropertyGroup()
 *
 * @phpstan-type MediaBridgeUpdatePropertyGroupParamsShape = array{
 *   appID: int, objectType: string, displayOrder?: int|null, label?: string|null
 * }
 */
final class MediaBridgeUpdatePropertyGroupParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeUpdatePropertyGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $objectType;

    #[Optional]
    public ?int $displayOrder;

    #[Optional]
    public ?string $label;

    /**
     * `new MediaBridgeUpdatePropertyGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeUpdatePropertyGroupParams::with(appID: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeUpdatePropertyGroupParams)->withAppID(...)->withObjectType(...)
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
        string $objectType,
        ?int $displayOrder = null,
        ?string $label = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['objectType'] = $objectType;

        null !== $displayOrder && $self['displayOrder'] = $displayOrder;
        null !== $label && $self['label'] = $label;

        return $self;
    }

    public function withAppID(int $appID): self
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

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }
}
