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
 * @see HubspotSDK\Services\Cms\MediaBridge\SchemasService::get()
 *
 * @phpstan-type SchemaGetParamsShape = array{appId: int}
 */
final class SchemaGetParams implements BaseModel
{
    /** @use SdkModel<SchemaGetParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /**
     * `new SchemaGetParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaGetParams::with(appId: ...)
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
    public static function with(int $appId): self
    {
        $obj = new self;

        $obj['appId'] = $appId;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }
}
