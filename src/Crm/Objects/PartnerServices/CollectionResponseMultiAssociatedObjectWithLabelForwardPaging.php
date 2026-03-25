<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\PartnerServices;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\MultiAssociatedObjectWithLabel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-import-type MultiAssociatedObjectWithLabelShape from \HubspotSDK\Crm\MultiAssociatedObjectWithLabel
 * @phpstan-import-type ForwardPagingShape from \HubspotSDK\ForwardPaging
 *
 * @phpstan-type CollectionResponseMultiAssociatedObjectWithLabelForwardPagingShape = array{
 *   results: list<MultiAssociatedObjectWithLabel|MultiAssociatedObjectWithLabelShape>,
 *   paging?: null|ForwardPaging|ForwardPagingShape,
 * }
 */
final class CollectionResponseMultiAssociatedObjectWithLabelForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponseMultiAssociatedObjectWithLabelForwardPagingShape>
     */
    use SdkModel;

    /** @var list<MultiAssociatedObjectWithLabel> $results */
    #[Required(list: MultiAssociatedObjectWithLabel::class)]
    public array $results;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseMultiAssociatedObjectWithLabelForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseMultiAssociatedObjectWithLabelForwardPaging::with(
     *   results: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseMultiAssociatedObjectWithLabelForwardPaging)
     *   ->withResults(...)
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
     * @param list<MultiAssociatedObjectWithLabel|MultiAssociatedObjectWithLabelShape> $results
     * @param ForwardPaging|ForwardPagingShape|null $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<MultiAssociatedObjectWithLabel|MultiAssociatedObjectWithLabelShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * @param ForwardPaging|ForwardPagingShape $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $self = clone $this;
        $self['paging'] = $paging;

        return $self;
    }
}
