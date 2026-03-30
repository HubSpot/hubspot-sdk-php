<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the property groups for a specified object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::listPropertyGroups()
 *
 * @phpstan-type MediaBridgeListPropertyGroupsParamsShape = array{appID: int}
 */
final class MediaBridgeListPropertyGroupsParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeListPropertyGroupsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new MediaBridgeListPropertyGroupsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeListPropertyGroupsParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeListPropertyGroupsParams)->withAppID(...)
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
    public static function with(int $appID): self
    {
        $self = new self;

        $self['appID'] = $appID;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }
}
