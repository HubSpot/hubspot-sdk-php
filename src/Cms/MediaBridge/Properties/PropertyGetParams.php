<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Properties;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the details for an existing property by name.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\PropertiesService::get()
 *
 * @phpstan-type PropertyGetParamsShape = array{appId: string, objectType: string}
 */
final class PropertyGetParams implements BaseModel
{
    /** @use SdkModel<PropertyGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appId;

    #[Api]
    public string $objectType;

    /**
     * `new PropertyGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PropertyGetParams::with(appId: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PropertyGetParams)->withAppID(...)->withObjectType(...)
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
    public static function with(string $appId, string $objectType): self
    {
        $obj = new self;

        $obj->appId = $appId;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }
}
