<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\AssociatedID;
use HubspotSDK\Paging;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type AssociatedIDShape from \HubspotSDK\Crm\AssociatedID
 * @phpstan-import-type PagingShape from \HubspotSDK\Paging
 *
 * @phpstan-type PublicAssociationMultiShape = array{
 *   from: PublicObjectID|PublicObjectIDShape,
 *   to: list<AssociatedIDShape>,
 *   paging?: null|Paging|PagingShape,
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
     * @param PublicObjectIDShape $from
     * @param list<AssociatedIDShape> $to
     * @param PagingShape $paging
     */
    public static function with(
        PublicObjectID|array $from,
        array $to,
        Paging|array|null $paging = null
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['to'] = $to;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param PublicObjectIDShape $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The IDs of objects that are associated with the object identified by the ID in 'from'.
     *
     * @param list<AssociatedIDShape> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param PagingShape $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
