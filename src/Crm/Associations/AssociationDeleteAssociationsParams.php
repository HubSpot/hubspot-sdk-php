<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\AssociationsService::deleteAssociations()
 *
 * @phpstan-type AssociationDeleteAssociationsParamsShape = array{
 *   objectType: string, objectID: string, toObjectType: string
 * }
 */
final class AssociationDeleteAssociationsParams implements BaseModel
{
    /** @use SdkModel<AssociationDeleteAssociationsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    #[Required]
    public string $objectID;

    #[Required]
    public string $toObjectType;

    /**
     * `new AssociationDeleteAssociationsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationDeleteAssociationsParams::with(
     *   objectType: ..., objectID: ..., toObjectType: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationDeleteAssociationsParams)
     *   ->withObjectType(...)
     *   ->withObjectID(...)
     *   ->withToObjectType(...)
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
    public static function with(
        string $objectType,
        string $objectID,
        string $toObjectType
    ): self {
        $self = new self;

        $self['objectType'] = $objectType;
        $self['objectID'] = $objectID;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    public function withToObjectType(string $toObjectType): self
    {
        $self = clone $this;
        $self['toObjectType'] = $toObjectType;

        return $self;
    }
}
