<?php

declare(strict_types=1);

namespace HubspotSDK\CRM;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Associations\V4\AssociationsV4AssociationSpec1;

/**
 * @phpstan-type crm_public_default_association = array{
 *   associationSpec: AssociationsV4AssociationSpec1,
 *   from: CRMPublicObjectID,
 *   to: CRMPublicObjectID,
 * }
 */
final class CRMPublicDefaultAssociation implements BaseModel
{
    /** @use SdkModel<crm_public_default_association> */
    use SdkModel;

    #[Api]
    public AssociationsV4AssociationSpec1 $associationSpec;

    #[Api]
    public CRMPublicObjectID $from;

    #[Api]
    public CRMPublicObjectID $to;

    /**
     * `new CRMPublicDefaultAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMPublicDefaultAssociation::with(associationSpec: ..., from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMPublicDefaultAssociation)
     *   ->withAssociationSpec(...)
     *   ->withFrom(...)
     *   ->withTo(...)
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
        AssociationsV4AssociationSpec1 $associationSpec,
        CRMPublicObjectID $from,
        CRMPublicObjectID $to,
    ): self {
        $obj = new self;

        $obj->associationSpec = $associationSpec;
        $obj->from = $from;
        $obj->to = $to;

        return $obj;
    }

    public function withAssociationSpec(
        AssociationsV4AssociationSpec1 $associationSpec
    ): self {
        $obj = clone $this;
        $obj->associationSpec = $associationSpec;

        return $obj;
    }

    public function withFrom(CRMPublicObjectID $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    public function withTo(CRMPublicObjectID $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
