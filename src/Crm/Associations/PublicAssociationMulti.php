<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-type PublicAssociationMultiShape = array{
 *   from: PublicObjectID, to: list<AssociatedID>, paging?: Paging|null
 * }
 */
final class PublicAssociationMulti implements BaseModel
{
    /** @use SdkModel<PublicAssociationMultiShape> */
    use SdkModel;

    #[Required]
    public PublicObjectID $from;

    /**
     * The IDs of objects that are associated with the object identified by the ID in 'from'.
     *
     * @var list<AssociatedID> $to
     */
    #[Required(list: AssociatedID::class)]
    public array $to;

    #[Optional]
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
     * @param PublicObjectID|array{id: string} $from
     * @param list<AssociatedID|array{id: string, type: string}> $to
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
     * The IDs of objects that are associated with the object identified by the ID in 'from'.
     *
     * @param list<AssociatedID|array{id: string, type: string}> $to
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
