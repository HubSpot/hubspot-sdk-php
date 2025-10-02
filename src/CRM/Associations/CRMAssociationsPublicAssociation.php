<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMPublicObjectID;

/**
 * @phpstan-type crm_associations_public_association = array{
 *   from: CRMPublicObjectID, to: CRMPublicObjectID, type: string
 * }
 */
final class CRMAssociationsPublicAssociation implements BaseModel
{
    /** @use SdkModel<crm_associations_public_association> */
    use SdkModel;

    #[Api]
    public CRMPublicObjectID $from;

    #[Api]
    public CRMPublicObjectID $to;

    #[Api]
    public string $type;

    /**
     * `new CRMAssociationsPublicAssociation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMAssociationsPublicAssociation::with(from: ..., to: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMAssociationsPublicAssociation)
     *   ->withFrom(...)
     *   ->withTo(...)
     *   ->withType(...)
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
        CRMPublicObjectID $from,
        CRMPublicObjectID $to,
        string $type
    ): self {
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;
        $obj->type = $type;

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

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
