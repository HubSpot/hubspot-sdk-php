<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing property for an object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::deleteProperty()
 *
 * @phpstan-type MediaBridgeDeletePropertyParamsShape = array{
 *   appID: string, objectType: string
 * }
 */
final class MediaBridgeDeletePropertyParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeDeletePropertyParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $appID;

    #[Required]
    public string $objectType;

    /**
     * `new MediaBridgeDeletePropertyParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeDeletePropertyParams::with(appID: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeDeletePropertyParams)->withAppID(...)->withObjectType(...)
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
    public static function with(string $appID, string $objectType): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['objectType'] = $objectType;

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
}
