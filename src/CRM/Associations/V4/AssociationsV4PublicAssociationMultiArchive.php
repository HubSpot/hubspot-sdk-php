<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMPublicObjectID;

/**
 * @phpstan-type associations_v4_public_association_multi_archive = array{
 *   from: CRMPublicObjectID, to: list<CRMPublicObjectID>
 * }
 */
final class AssociationsV4PublicAssociationMultiArchive implements BaseModel
{
    /** @use SdkModel<associations_v4_public_association_multi_archive> */
    use SdkModel;

    #[Api]
    public CRMPublicObjectID $from;

    /** @var list<CRMPublicObjectID> $to */
    #[Api(list: CRMPublicObjectID::class)]
    public array $to;

    /**
     * `new AssociationsV4PublicAssociationMultiArchive()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4PublicAssociationMultiArchive::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4PublicAssociationMultiArchive)->withFrom(...)->withTo(...)
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
     * @param list<CRMPublicObjectID> $to
     */
    public static function with(CRMPublicObjectID $from, array $to): self
    {
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

    /**
     * @param list<CRMPublicObjectID> $to
     */
    public function withTo(array $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }
}
