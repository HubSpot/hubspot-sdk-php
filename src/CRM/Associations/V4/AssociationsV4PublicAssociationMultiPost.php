<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMPublicObjectID;

/**
 * @phpstan-type associations_v4_public_association_multi_post = array{
 *   from: CRMPublicObjectID,
 *   to: CRMPublicObjectID,
 *   types: list<AssociationsV4AssociationSpec1>,
 * }
 */
final class AssociationsV4PublicAssociationMultiPost implements BaseModel
{
    /** @use SdkModel<associations_v4_public_association_multi_post> */
    use SdkModel;

    #[Api]
    public CRMPublicObjectID $from;

    #[Api]
    public CRMPublicObjectID $to;

    /** @var list<AssociationsV4AssociationSpec1> $types */
    #[Api(list: AssociationsV4AssociationSpec1::class)]
    public array $types;

    /**
     * `new AssociationsV4PublicAssociationMultiPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4PublicAssociationMultiPost::with(from: ..., to: ..., types: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4PublicAssociationMultiPost)
     *   ->withFrom(...)
     *   ->withTo(...)
     *   ->withTypes(...)
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
     * @param list<AssociationsV4AssociationSpec1> $types
     */
    public static function with(
        CRMPublicObjectID $from,
        CRMPublicObjectID $to,
        array $types
    ): self {
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;
        $obj->types = $types;

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

    /**
     * @param list<AssociationsV4AssociationSpec1> $types
     */
    public function withTypes(array $types): self
    {
        $obj = clone $this;
        $obj->types = $types;

        return $obj;
    }
}
