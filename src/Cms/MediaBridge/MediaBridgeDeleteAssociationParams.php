<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing association definition for an object type.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::deleteAssociation()
 *
 * @phpstan-type MediaBridgeDeleteAssociationParamsShape = array{
 *   appID: int, objectType: string
 * }
 */
final class MediaBridgeDeleteAssociationParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeDeleteAssociationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
    public string $objectType;

    /**
     * `new MediaBridgeDeleteAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeDeleteAssociationParams::with(appID: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeDeleteAssociationParams)->withAppID(...)->withObjectType(...)
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
    public static function with(int $appID, string $objectType): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['objectType'] = $objectType;

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
}
