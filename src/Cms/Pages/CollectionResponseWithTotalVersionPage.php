<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\NextPage;
use HubspotSDK\Paging;
use HubspotSDK\PreviousPage;

/**
 * Response object for collections of page versions with pagination information.
 *
 * @phpstan-type CollectionResponseWithTotalVersionPageShape = array{
 *   results: list<mixed>, total: int, paging?: Paging|null
 * }
 */
final class CollectionResponseWithTotalVersionPage implements BaseModel
{
    /** @use SdkModel<CollectionResponseWithTotalVersionPageShape> */
    use SdkModel;

    /**
     * Collection of page versions.
     *
     * @var list<mixed> $results
     */
    #[Api(list: VersionPage::class)]
    public array $results;

    /**
     * Total number of page versions.
     */
    #[Api]
    public int $total;

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
     * @param list<mixed> $results
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public static function with(
        array $results,
        int $total,
        Paging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;
        $obj['total'] = $total;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * Collection of page versions.
     *
     * @param list<mixed> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * Total number of page versions.
     */
    public function withTotal(int $total): self
    {
        $obj = clone $this;
        $obj['total'] = $total;

        return $obj;
    }

    /**
     * @param Paging|array{next?: NextPage|null, prev?: PreviousPage|null} $paging
     */
    public function withPaging(Paging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
