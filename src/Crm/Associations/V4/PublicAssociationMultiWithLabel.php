<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociationSpecWithLabel;
use HubspotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type PublicAssociationMultiWithLabelShape = array{
 *   from: PublicObjectID,
 *   to: list<MultiAssociatedObjectWithLabel>,
 *   paging?: Paging|null,
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

    #[Api(optional: true)]
    public ?Paging $paging;

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
     * @param PublicObjectID|array{id: string} $from
     * @param list<MultiAssociatedObjectWithLabel|array{
     *   associationTypes: list<AssociationSpecWithLabel>, toObjectId: string
     * }> $to
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        PublicObjectID|array $from,
        array $to,
        Paging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['from'] = $from;
        $obj['to'] = $to;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param PublicObjectID|array{id: string} $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * @param list<MultiAssociatedObjectWithLabel|array{
     *   associationTypes: list<AssociationSpecWithLabel>, toObjectId: string
     * }> $to
     */
    public function withTo(array $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
