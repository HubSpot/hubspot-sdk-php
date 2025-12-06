<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a blog post by the post ID.
 *
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::get()
 *
 * @phpstan-type PostGetParamsShape = array{archived?: bool, property?: string}
 */
final class PostGetParams implements BaseModel
{
    /** @use SdkModel<PostGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Specifies whether to return deleted blog posts. Defaults to `false`.
     */
    #[Api(optional: true)]
    public ?bool $archived;

    /**
     * Specific properties to return.
     */
    #[Api(optional: true)]
    public ?string $property;

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
        ?bool $archived = null,
        ?string $property = null
    ): self {
        $obj = new self;

        null !== $archived && $obj['archived'] = $archived;
        null !== $property && $obj['property'] = $property;

        return $obj;
    }

    /**
     * Specifies whether to return deleted blog posts. Defaults to `false`.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * Specific properties to return.
     */
    public function withProperty(string $property): self
    {
        $obj = clone $this;
        $obj['property'] = $property;

        return $obj;
    }
}
