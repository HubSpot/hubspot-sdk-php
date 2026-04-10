<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\ObjectSchemas;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Remove an association between two object types identified by the association identifier and object type. This operation is irreversible and will permanently delete the specified association.
 *
 * @see HubSpotSDK\Services\Crm\ObjectSchemasService::deleteAssociation()
 *
 * @phpstan-type ObjectSchemaDeleteAssociationParamsShape = array{
 *   objectType: string
 * }
 */
final class ObjectSchemaDeleteAssociationParams implements BaseModel
{
    /** @use SdkModel<ObjectSchemaDeleteAssociationParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * `new ObjectSchemaDeleteAssociationParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ObjectSchemaDeleteAssociationParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ObjectSchemaDeleteAssociationParams)->withObjectType(...)
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
    public static function with(string $objectType): self
    {
        $self = new self;

        $self['objectType'] = $objectType;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }
}
