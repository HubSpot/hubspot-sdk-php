<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve all the previous versions of a blog post.
 *
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::getPreviousVersions()
 *
 * @phpstan-type PostGetPreviousVersionsParamsShape = array{
 *   after?: string, before?: string, limit?: int
 * }
 */
final class PostGetPreviousVersionsParams implements BaseModel
{
    /** @use SdkModel<PostGetPreviousVersionsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    #[Optional]
    public ?string $after;

    #[Optional]
    public ?string $before;

    /**
     * The maximum number of results to return. Default is 100.
     */
    #[Optional]
    public ?int $limit;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $after = null,
        ?string $before = null,
        ?int $limit = null
    ): self {
        $obj = new self;

        null !== $after && $obj['after'] = $after;
        null !== $before && $obj['before'] = $before;
        null !== $limit && $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * The cursor token value to get the next set of results. You can get this from the `paging.next.after` JSON property of a paged response containing more results.
     */
    public function withAfter(string $after): self
    {
        $obj = clone $this;
        $obj['after'] = $after;

        return $obj;
    }

    public function withBefore(string $before): self
    {
        $obj = clone $this;
        $obj['before'] = $before;

        return $obj;
    }

    /**
     * The maximum number of results to return. Default is 100.
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }
}
