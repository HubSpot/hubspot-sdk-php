<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Defines the type, direction, and details of the relationship between two CRM objects.
 *
 * @phpstan-type AssociationSpecShape = array{
 *   associationCategory: AssociationCategory|value-of<AssociationCategory>,
 *   associationTypeID: int,
 * }
 */
final class AssociationSpec implements BaseModel
{
    /** @use SdkModel<AssociationSpecShape> */
    use SdkModel;

    /**
     * The category of the association, such as "HUBSPOT_DEFINED".
     *
     * @var value-of<AssociationCategory> $associationCategory
     */
    #[Required(enum: AssociationCategory::class)]
    public string $associationCategory;

    /**
     * The ID representing the specific type of association.
     */
    #[Required('associationTypeId')]
    public int $associationTypeID;

    /**
     * `new AssociationSpec()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationSpec::with(associationCategory: ..., associationTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationSpec)->withAssociationCategory(...)->withAssociationTypeID(...)
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
     *
     * @param AssociationCategory|value-of<AssociationCategory> $associationCategory
     */
    public static function with(
        AssociationCategory|string $associationCategory,
        int $associationTypeID
    ): self {
        $self = new self;

        $self['associationCategory'] = $associationCategory;
        $self['associationTypeID'] = $associationTypeID;

        return $self;
    }

    /**
     * The category of the association, such as "HUBSPOT_DEFINED".
     *
     * @param AssociationCategory|value-of<AssociationCategory> $associationCategory
     */
    public function withAssociationCategory(
        AssociationCategory|string $associationCategory
    ): self {
        $self = clone $this;
        $self['associationCategory'] = $associationCategory;

        return $self;
    }

    /**
     * The ID representing the specific type of association.
     */
    public function withAssociationTypeID(int $associationTypeID): self
    {
        $self = clone $this;
        $self['associationTypeID'] = $associationTypeID;

        return $self;
    }
}
