<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * Response object for collections of marketing emails with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalPublicEmailForwardPagingShape = array{
 *   results: list<PublicEmail>, total: int, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseWithTotalPublicEmailForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalPublicEmailForwardPagingShape> */
    use SdkModel;

    /**
     * Collection of emails.
     *
     * @var list<PublicEmail> $results
     */
    #[Api(list: PublicEmail::class)]
    public array $results;

    /**
     * Total number of content emails.
     */
    #[Api]
    public int $total;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseWithTotalPublicEmailForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalPublicEmailForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalPublicEmailForwardPaging)
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
     * @param list<PublicEmail> $results
     */
    public static function with(
        array $results,
        int $total,
        ?ForwardPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * Collection of emails.
     *
     * @param list<PublicEmail> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Total number of content emails.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }

    public function withPaging(ForwardPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
