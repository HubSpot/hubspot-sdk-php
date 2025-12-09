<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a previous version of a blog post.
 *
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::getPreviousVersion()
 *
 * @phpstan-type PostGetPreviousVersionParamsShape = array{objectID: string}
 */
final class PostGetPreviousVersionParams implements BaseModel
{
    /** @use SdkModel<PostGetPreviousVersionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new PostGetPreviousVersionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostGetPreviousVersionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostGetPreviousVersionParams)->withObjectID(...)
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
     */
    public static function with(string $objectID): self
    {
        $obj = new self;

        $obj['objectID'] = $objectID;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectID'] = $objectID;

        return $obj;
    }
}
