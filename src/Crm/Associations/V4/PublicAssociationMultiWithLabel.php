<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubspotSDK\Marketing\Emails\EmailsPaging;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type PublicAssociationMultiWithLabelShape = array{
 *   from: PublicObjectID,
 *   to: list<MultiAssociatedObjectWithLabel>,
 *   paging?: EmailsPaging,
 * }
 */
final class PublicAssociationMultiWithLabel implements BaseModel
{
    /** @use SdkModel<PublicAssociationMultiWithLabelShape> */
    use SdkModel;

    #[Api]
    public PublicObjectID $from;

    /** @var list<MultiAssociatedObjectWithLabel> $to */
    #[Api(list: MultiAssociatedObjectWithLabel::class)]
    public array $to;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?EmailsPaging $paging;

    /**
     * `new PublicAssociationMultiWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationMultiWithLabel::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationMultiWithLabel)->withFrom(...)->withTo(...)
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
     * @param list<MultiAssociatedObjectWithLabel> $to
     */
    public static function with(
        PublicObjectID $from,
        array $to,
        ?EmailsPaging $paging = null
    ): self {
        $obj = new self;

        $obj->from = $from;
        $obj->to = $to;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    public function withFrom(PublicObjectID $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * @param list<MultiAssociatedObjectWithLabel> $to
     */
    public function withTo(array $to): self
    {
        $obj = clone $this;
        $obj->to = $to;

        return $obj;
    }

    /**
     * Contains information pagination of results.
     */
    public function withPaging(EmailsPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
