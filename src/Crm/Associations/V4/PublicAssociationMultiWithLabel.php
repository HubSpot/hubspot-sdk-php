<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Associations\V4;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubspotSDK\Paging;
use HubspotSDK\PublicObjectID;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type MultiAssociatedObjectWithLabelShape from \HubspotSDK\Crm\MultiAssociatedObjectWithLabel
 * @phpstan-import-type PagingShape from \HubspotSDK\Paging
 *
 * @phpstan-type PublicAssociationMultiWithLabelShape = array{
 *   from: PublicObjectID|PublicObjectIDShape,
 *   to: list<MultiAssociatedObjectWithLabel|MultiAssociatedObjectWithLabelShape>,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class PublicAssociationMultiWithLabel implements BaseModel
{
    /** @use SdkModel<PublicAssociationMultiWithLabelShape> */
    use SdkModel;

    #[Required]
    public PublicObjectID $from;

    /** @var list<MultiAssociatedObjectWithLabel> $to */
    #[Required(list: MultiAssociatedObjectWithLabel::class)]
    public array $to;

    #[Optional]
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
     * @param PublicObjectID|PublicObjectIDShape $from
     * @param list<MultiAssociatedObjectWithLabel|MultiAssociatedObjectWithLabelShape> $to
     * @param Paging|PagingShape|null $paging
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
     * @param PublicObjectID|PublicObjectIDShape $from
     */
    public function withFrom(PublicObjectID|array $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * @param list<MultiAssociatedObjectWithLabel|MultiAssociatedObjectWithLabelShape> $to
     */
    public function withTo(array $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param Paging|PagingShape $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
