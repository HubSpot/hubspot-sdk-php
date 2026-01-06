<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\URLRedirects;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseWithTotalURLMappingForwardPagingShape = array{
 *   results: list<URLMapping>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalURLMappingForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalURLMappingForwardPagingShape> */
    use SdkModel;

    /** @var list<URLMapping> $results */
    #[Required(list: URLMapping::class)]
    public array $results;

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
     * @param list<URLMapping|array{
     *   id: string,
     *   destination: string,
     *   isMatchFullURL: bool,
     *   isMatchQueryString: bool,
     *   isOnlyAfterNotFound: bool,
     *   isPattern: bool,
     *   isProtocolAgnostic: bool,
     *   isTrailingSlashOptional: bool,
     *   precedence: int,
     *   redirectStyle: int,
     *   routePrefix: string,
     *   created?: \DateTimeInterface|null,
     *   updated?: \DateTimeInterface|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;
        $obj['total'] = $total;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<URLMapping|array{
     *   id: string,
     *   destination: string,
     *   isMatchFullURL: bool,
     *   isMatchQueryString: bool,
     *   isOnlyAfterNotFound: bool,
     *   isPattern: bool,
     *   isProtocolAgnostic: bool,
     *   isTrailingSlashOptional: bool,
     *   precedence: int,
     *   redirectStyle: int,
     *   routePrefix: string,
     *   created?: \DateTimeInterface|null,
     *   updated?: \DateTimeInterface|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
