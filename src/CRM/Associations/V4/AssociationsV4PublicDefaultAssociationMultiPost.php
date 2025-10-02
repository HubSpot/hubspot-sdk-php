<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMPublicObjectID;

/**
 * @phpstan-type associations_v4_public_default_association_multi_post = array{
 *   from: CRMPublicObjectID, to: CRMPublicObjectID
 * }
 */
final class AssociationsV4PublicDefaultAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<associations_v4_public_default_association_multi_post> */
    use SdkModel;

    #[Api]
    public CRMPublicObjectID $from;

    #[Api]
    public CRMPublicObjectID $to;

    /**
     * `new AssociationsV4PublicDefaultAssociationMultiPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4PublicDefaultAssociationMultiPost::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4PublicDefaultAssociationMultiPost)
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
        CRMPublicObjectID $from,
        CRMPublicObjectID $to
    ): self {
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;

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
