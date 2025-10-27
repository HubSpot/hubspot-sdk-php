<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Get the schema for a specified object type.
 *
 * @see HubspotSDK\Cms\MediaBridge\Schemas->get
 *
 * @phpstan-type schema_get_params = array{appID: string}
 */
final class SchemaGetParams implements BaseModel
{
    /** @use SdkModel<schema_get_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    /**
     * `new SchemaGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaGetParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SchemaGetParams)->withAppID(...)
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
