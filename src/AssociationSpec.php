<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Defines the type, direction, and details of the relationship between two CRM objects.
 *
 * @phpstan-type AssociationSpecShape = array{
 *   associationCategory: value-of<AssociationCategory>, associationTypeID: int
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
    #[Api(enum: AssociationCategory::class)]
    public string $associationCategory;

    /**
     * The ID representing the specific type of association.
     */
    #[Api('associationTypeId')]
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
        $obj = new self;

        $obj['associationCategory'] = $associationCategory;
        $obj->associationTypeID = $associationTypeID;

        return $obj;
    }

    /**
     * The category of the association, such as "HUBSPOT_DEFINED".
     *
     * @param AssociationCategory|value-of<AssociationCategory> $associationCategory
     */
    public function withAssociationCategory(
        AssociationCategory|string $associationCategory
    ): self {
        $obj = clone $this;
        $obj['associationCategory'] = $associationCategory;

        return $obj;
    }

    /**
     * The ID representing the specific type of association.
     */
    public function withAssociationTypeID(int $associationTypeID): self
    {
        $obj = clone $this;
        $obj->associationTypeID = $associationTypeID;

        return $obj;
    }
}
