<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\URLRedirects;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\ForwardPaging;

/**
 * @phpstan-import-type URLMappingShape from \HubSpotSDK\Cms\URLRedirects\URLMapping
 * @phpstan-import-type ForwardPagingShape from \HubSpotSDK\ForwardPaging
 *
 * @phpstan-type CollectionResponseWithTotalURLMappingForwardPagingShape = array{
 *   results: list<URLMapping|URLMappingShape>,
 *   total: int,
 *   paging?: null|ForwardPaging|ForwardPagingShape,
 * }
 */
final class CollectionResponseWithTotalURLMappingForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalURLMappingForwardPagingShape> */
    use SdkModel;

    /**
     * An array of UrlMapping objects, each representing a specific URL mapping.
     *
     * @var list<URLMapping> $results
     */
    #[Required(list: URLMapping::class)]
    public array $results;

    /**
     * The total number of URL mappings available.
     */
    #[Required]
    public int $total;

    #[Optional]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalURLMappingForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalURLMappingForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalURLMappingForwardPaging)
     *   ->withResults(...)
     *   ->withTotal(...)
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
     * @param list<URLMapping|URLMappingShape> $results
     * @param ForwardPaging|ForwardPagingShape|null $paging
     */
    public static function with(
        array $results,
        int $total,
        ForwardPaging|array|null $paging = null
    ): self {
        $self = new self;

        $self['results'] = $results;
        $self['total'] = $total;

        null !== $paging && $self['paging'] = $paging;

        return $self;
    }

    /**
     * An array of UrlMapping objects, each representing a specific URL mapping.
     *
     * @param list<URLMapping|URLMappingShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }

    /**
     * The total number of URL mappings available.
     */
    public function withTotal(int $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

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
