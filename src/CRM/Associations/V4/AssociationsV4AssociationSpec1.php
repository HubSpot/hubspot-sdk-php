<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\V4\AssociationsV4AssociationSpec1\AssociationCategory;

/**
 * @phpstan-type associations_v4_association_spec1 = array{
 *   associationCategory: value-of<AssociationCategory>, associationTypeID: int
 * }
 */
final class AssociationsV4AssociationSpec1 implements BaseModel
{
    /** @use SdkModel<associations_v4_association_spec1> */
    use SdkModel;

    /** @var value-of<AssociationCategory> $associationCategory */
    #[Api(enum: AssociationCategory::class)]
    public string $associationCategory;

    #[Api('associationTypeId')]
    public int $associationTypeID;

    /**
     * `new AssociationsV4AssociationSpec1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4AssociationSpec1::with(
     *   associationCategory: ..., associationTypeID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4AssociationSpec1)
     *   ->withAssociationCategory(...)
     *   ->withAssociationTypeID(...)
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

        $obj->associationCategory = $associationCategory instanceof AssociationCategory ? $associationCategory->value : $associationCategory;
        $obj->associationTypeID = $associationTypeID;

        return $obj;
    }

    /**
     * @param AssociationCategory|value-of<AssociationCategory> $associationCategory
     */
    public function withAssociationCategory(
        AssociationCategory|string $associationCategory
    ): self {
        $obj = clone $this;
        $obj->associationCategory = $associationCategory instanceof AssociationCategory ? $associationCategory->value : $associationCategory;

        return $obj;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $obj = clone $this;
        $obj->associationTypeID = $associationTypeID;

        return $obj;
    }
}
