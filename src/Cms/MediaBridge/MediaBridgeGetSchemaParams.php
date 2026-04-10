<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Get the schema for a specified object type.
 *
 * @see HubSpotSDK\Services\Cms\MediaBridgeService::getSchema()
 *
 * @phpstan-type MediaBridgeGetSchemaParamsShape = array{appID: int}
 */
final class MediaBridgeGetSchemaParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeGetSchemaParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * `new MediaBridgeGetSchemaParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaBridgeGetSchemaParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaBridgeGetSchemaParams)->withAppID(...)
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
