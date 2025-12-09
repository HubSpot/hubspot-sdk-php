<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge\Schemas;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Delete an existing association definition for an object type.
 *
 * @see HubspotSDK\Services\Cms\MediaBridge\SchemasService::deleteAssociation()
 *
 * @phpstan-type SchemaDeleteAssociationParamsShape = array{
 *   appID: int, objectType: string
 * }
 */
final class SchemaDeleteAssociationParams implements BaseModel
{
    /** @use SdkModel<SchemaDeleteAssociationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    #[Required]
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
    public static function with(int $appID, string $objectType): self
    {
        $self = new self;

        $self['appID'] = $appID;
        $self['objectType'] = $objectType;

        return $self;
    }

    public function withAppID(int $appID): self
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
