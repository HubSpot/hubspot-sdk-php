<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMAssociationSpec\AssociationCategory;

/**
 * @phpstan-type crm_association_spec = array{
 *   associationCategory: value-of<AssociationCategory>, associationTypeID: int
 * }
 */
final class CRMAssociationSpec implements BaseModel
{
    /** @use SdkModel<crm_association_spec> */
    use SdkModel;

    /** @var value-of<AssociationCategory> $associationCategory */
    #[Api(enum: AssociationCategory::class)]
    public string $associationCategory;

    #[Api('associationTypeId')]
    public int $associationTypeID;

    /**
     * `new CRMAssociationSpec()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMAssociationSpec::with(associationCategory: ..., associationTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMAssociationSpec)
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

        $obj['associationCategory'] = $associationCategory;
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
        $obj['associationCategory'] = $associationCategory;

        return $obj;
    }

    public function withAssociationTypeID(int $associationTypeID): self
    {
        $obj = clone $this;
        $obj->associationTypeID = $associationTypeID;

        return $obj;
    }
}
