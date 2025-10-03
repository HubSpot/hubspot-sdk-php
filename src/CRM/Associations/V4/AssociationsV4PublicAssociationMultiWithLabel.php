<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMMultiAssociatedObjectWithLabel;
use HubspotSDK\CRM\CRMPublicObjectID;
use HubspotSDK\Marketing\Emails\MarketingEmailsPaging;

/**
 * @phpstan-type associations_v4_public_association_multi_with_label = array{
 *   from: CRMPublicObjectID,
 *   to: list<CRMMultiAssociatedObjectWithLabel>,
 *   paging?: MarketingEmailsPaging,
 * }
 */
final class AssociationsV4PublicAssociationMultiWithLabel implements BaseModel
{
    /** @use SdkModel<associations_v4_public_association_multi_with_label> */
    use SdkModel;

    #[Api]
    public CRMPublicObjectID $from;

    /** @var list<CRMMultiAssociatedObjectWithLabel> $to */
    #[Api(list: CRMMultiAssociatedObjectWithLabel::class)]
    public array $to;

    #[Api(optional: true)]
    public ?MarketingEmailsPaging $paging;

    /**
     * `new AssociationsV4PublicAssociationMultiWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssociationsV4PublicAssociationMultiWithLabel::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssociationsV4PublicAssociationMultiWithLabel)->withFrom(...)->withTo(...)
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
     * @param list<CRMMultiAssociatedObjectWithLabel> $to
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
     * @param list<CRMMultiAssociatedObjectWithLabel> $to
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
