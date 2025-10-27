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
 * @phpstan-type schema_delete_association_params = array{
 *   appID: string, objectType: string
 * }
 */
final class SchemaDeleteAssociationParams implements BaseModel
{
    /** @use SdkModel<schema_delete_association_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $appID;

    #[Api]
    public string $objectType;

    /**
     * `new SchemaDeleteAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SchemaDeleteAssociationParams::with(appID: ..., objectType: ...)
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
    public static function with(string $appID, string $objectType): self
    {
        $obj = new self;

        $obj->appID = $appID;
        $obj->objectType = $objectType;

        return $obj;
    }

    public function withAppID(string $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj->objectType = $objectType;

        return $obj;
    }
}
