<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Tags;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type blogs_tags_collection_response_with_total_tag_forward_paging = array{
 *   results: list<BlogsTagsTag>, total: int, paging?: ForwardPaging
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class BlogsTagsCollectionResponseWithTotalTagForwardPaging implements BaseModel
{
    /**
     * @use SdkModel<blogs_tags_collection_response_with_total_tag_forward_paging>
     */
    use SdkModel;

    /** @var list<BlogsTagsTag> $results */
    #[Api(list: BlogsTagsTag::class)]
    public array $results;

    #[Api]
    public int $total;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new BlogsTagsCollectionResponseWithTotalTagForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogsTagsCollectionResponseWithTotalTagForwardPaging::with(
     *   results: ..., total: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogsTagsCollectionResponseWithTotalTagForwardPaging)
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
     * @param list<BlogsTagsTag> $results
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
     * @param list<BlogsTagsTag> $results
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
