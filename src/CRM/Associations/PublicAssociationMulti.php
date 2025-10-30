<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Associations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\AssociatedID;
use HubspotSDK\Marketing\Emails\Paging;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type PublicAssociationMultiShape = array{
 *   from: PublicObjectID, to: list<AssociatedID>, paging?: Paging
 * }
 */
final class PublicAssociationMulti implements BaseModel
{
    /** @use SdkModel<PublicAssociationMultiShape> */
    use SdkModel;

    #[Api]
    public PublicObjectID $from;

    /**
     * The IDs of objects that are associated with the object identified by the ID in 'from'.
     *
     * @var list<AssociatedID> $to
     */
    #[Api(list: AssociatedID::class)]
    public array $to;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new PublicAssociationMulti()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAssociationMulti::with(from: ..., to: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAssociationMulti)->withFrom(...)->withTo(...)
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
     * @param list<AssociatedID> $to
     */
    public static function with(
        PublicObjectID $from,
        array $to,
        ?Paging $paging = null
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
     * The IDs of objects that are associated with the object identified by the ID in 'from'.
     *
     * @param list<AssociatedID> $to
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
    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
