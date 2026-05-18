<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Paging;
use HubSpotSDK\PublicObjectID;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 * @phpstan-import-type MultiAssociatedObjectWithLabelShape from \HubSpotSDK\Crm\MultiAssociatedObjectWithLabel
 * @phpstan-import-type PagingShape from \HubSpotSDK\Paging
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

    /**
     * Contains the Id of a Public Object.
     */
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
     * Contains the Id of a Public Object.
     *
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
