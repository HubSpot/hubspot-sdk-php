<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the existing properties defined for a media object type.
 *
 * @see HubspotSDK\Cms\MediaBridge\Properties->list
 *
 * @phpstan-type PropertyListParamsShape = array{appID: string}
 */
final class PropertyListParams implements BaseModel
{
    /** @use SdkModel<PropertyListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    /**
     * `new PropertyListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyListParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyListParams)->withAppID(...)
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
        $obj = new self;

        $obj->appID = $appID;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }
}
