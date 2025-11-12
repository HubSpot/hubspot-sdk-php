<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Schemas;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing association definition for an object type.
 *
 * @see HubspotSDK\Cms\MediaBridge\Schemas->deleteAssociation
 *
 * @phpstan-type SchemaDeleteAssociationParamsShape = array{
 *   appId: string, objectType: string
 * }
 */
final class SchemaDeleteAssociationParams implements BaseModel
{
    /** @use SdkModel<SchemaDeleteAssociationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appId;

    #[Api]
    public string $objectType;

    /**
     * `new SchemaDeleteAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaDeleteAssociationParams::with(appId: ..., objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SchemaDeleteAssociationParams)->withAppID(...)->withObjectType(...)
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
