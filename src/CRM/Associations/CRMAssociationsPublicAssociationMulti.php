<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMAssociatedID;
use HubspotSDK\CRM\CRMPublicObjectID;
use HubspotSDK\Marketing\Emails\MarketingEmailsPaging;

/**
 * @phpstan-type crm_associations_public_association_multi = array{
 *   from: CRMPublicObjectID,
 *   to: list<CRMAssociatedID>,
 *   paging?: MarketingEmailsPaging,
 * }
 */
final class CRMAssociationsPublicAssociationMulti implements BaseModel
{
    /** @use SdkModel<crm_associations_public_association_multi> */
    use SdkModel;

    #[Api]
    public CRMPublicObjectID $from;

    /** @var list<CRMAssociatedID> $to */
    #[Api(list: CRMAssociatedID::class)]
    public array $to;

    #[Api(optional: true)]
    public ?MarketingEmailsPaging $paging;

    /**
     * `new CRMAssociationsPublicAssociationMulti()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CRMAssociationsPublicAssociationMulti::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CRMAssociationsPublicAssociationMulti)->withFrom(...)->withTo(...)
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
     * @param list<CRMAssociatedID> $to
     */
    public static function with(
        CRMPublicObjectID $from,
        array $to,
        ?MarketingEmailsPaging $paging = null
    ): self {
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    public function withFrom(CRMPublicObjectID $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * @param list<CRMAssociatedID> $to
     */
    public function withTo(array $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    public function withPaging(MarketingEmailsPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
