<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Marketing\Emails\Paging;

/**
 * Response object for collections of page versions with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalVersionPageShape = array{
 *   results: list<VersionPage>, total: int, paging?: Paging
 * }
 */
final class CollectionResponseWithTotalVersionPage implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalVersionPageShape> */
    use SdkModel;

    /**
     * Collection of page versions.
     *
     * @var list<VersionPage> $results
     */
    #[Api(list: VersionPage::class)]
    public array $results;

    /**
     * Total number of page versions.
     */
    #[Api]
    public int $total;

    /**
     * Contains information pagination of results.
     */
    #[Api(optional: true)]
    public ?Paging $paging;

    /**
     * `new CollectionResponseWithTotalVersionPage()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseWithTotalVersionPage::with(results: ..., total: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseWithTotalVersionPage)->withResults(...)->withTotal(...)
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
     * @param list<VersionPage> $results
     */
    public static function with(
        array $results,
        int $total,
        ?Paging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;
        $obj->total = $total;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * Collection of page versions.
     *
     * @param list<VersionPage> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    /**
     * Total number of page versions.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }

    /**
     * Contains information pagination of results.
     */
    public function withPaging(Paging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
