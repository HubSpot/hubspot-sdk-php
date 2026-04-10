<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\ForwardPaging;

/**
 * @phpstan-import-type MultiAssociatedObjectWithLabelShape from \HubSpotSDK\Crm\MultiAssociatedObjectWithLabel
 * @phpstan-import-type ForwardPagingShape from \HubSpotSDK\ForwardPaging
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
