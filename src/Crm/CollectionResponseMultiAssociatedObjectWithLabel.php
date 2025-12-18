<?php

declare(strict_types=1);

namespace HubspotSDK\Crm;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Paging;

/**
 * @phpstan-import-type MultiAssociatedObjectWithLabelShape from \HubspotSDK\Crm\MultiAssociatedObjectWithLabel
 * @phpstan-import-type PagingShape from \HubspotSDK\Paging
 *
 * @phpstan-type CollectionResponseMultiAssociatedObjectWithLabelShape = array{
 *   results: list<MultiAssociatedObjectWithLabelShape>,
 *   paging?: null|Paging|PagingShape,
 * }
 */
final class CollectionResponseMultiAssociatedObjectWithLabel implements BaseModel
{
    /** @use SdkModel<CollectionResponseMultiAssociatedObjectWithLabelShape> */
    use SdkModel;

    /** @var list<MultiAssociatedObjectWithLabel> $results */
    #[Required(list: MultiAssociatedObjectWithLabel::class)]
    public array $results;

    #[Optional]
    public ?Paging $paging;

    /**
     * `new CollectionResponseMultiAssociatedObjectWithLabel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseMultiAssociatedObjectWithLabel::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseMultiAssociatedObjectWithLabel)->withResults(...)
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
     * @param list<MultiAssociatedObjectWithLabelShape> $results
     * @param Paging|PagingShape|null $paging
     */
    public static function with(
        array $results,
        Paging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * @param list<MultiAssociatedObjectWithLabelShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

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
