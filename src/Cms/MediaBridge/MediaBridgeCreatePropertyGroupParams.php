<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a new property group for the specified object type.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::createPropertyGroup()
 *
 * @phpstan-type MediaBridgeCreatePropertyGroupParamsShape = array{
 *   appID: int, label: string, name: string, displayOrder?: int|null
 * }
 */
final class MediaBridgeCreatePropertyGroupParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeCreatePropertyGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $label;

    #[Required]
    public string $name;

    #[Optional]
    public ?int $displayOrder;

    /**
     * `new MediaBridgeCreatePropertyGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeCreatePropertyGroupParams::with(appID: ..., label: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeCreatePropertyGroupParams)
     *   ->withAppID(...)
     *   ->withLabel(...)
     *   ->withName(...)
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
        string $label,
        string $name,
        ?int $displayOrder = null
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['label'] = $label;
        $self['name'] = $name;

        null !== $displayOrder && $self['displayOrder'] = $displayOrder;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withDisplayOrder(int $displayOrder): self
    {
        $self = clone $this;
        $self['displayOrder'] = $displayOrder;

        return $self;
    }
}
