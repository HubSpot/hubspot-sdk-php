<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type cms_hubdb_collection_response_with_total_hub_db_table_v3_forward_paging = array{
 *   results: list<CmsHubdbHubDBTableV3>, total: int, paging?: ForwardPaging
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<cms_hubdb_collection_response_with_total_hub_db_table_v3_forward_paging>
     */
    use SdkModel;

    /** @var list<CmsHubdbHubDBTableV3> $results */
    #[Api(list: CmsHubdbHubDBTableV3::class)]
    public array $results;

    #[Api]
    public int $total;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsHubdbCollectionResponseWithTotalHubDBTableV3ForwardPaging)
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
     * @param list<CmsHubdbHubDBTableV3> $results
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
     * @param list<CmsHubdbHubDBTableV3> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

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
