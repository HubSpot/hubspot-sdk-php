<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the schema for a specified object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridgeService::getSchema()
 *
 * @phpstan-type MediaBridgeGetSchemaParamsShape = array{appID: string}
 */
final class MediaBridgeGetSchemaParams implements BaseModel
{
    /** @use SdkModel<MediaBridgeGetSchemaParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $appID;

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
    public static function with(string $appID): self
    {
        $self = new self;

        $self['appID'] = $appID;

        return $self;
    }

    public function withAppID(string $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }
}
