<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Takes a specified version of a blog post, sets it as the new draft version of the blog post.
 *
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::restorePreviousVersionToDraft()
 *
 * @phpstan-type PostRestorePreviousVersionToDraftParamsShape = array{
 *   objectId: string
 * }
 */
final class PostRestorePreviousVersionToDraftParams implements BaseModel
{
    /** @use SdkModel<PostRestorePreviousVersionToDraftParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectId;

    /**
     * `new PostRestorePreviousVersionToDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostRestorePreviousVersionToDraftParams::with(objectId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostRestorePreviousVersionToDraftParams)->withObjectID(...)
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
    public static function with(string $objectId): self
    {
        $obj = new self;

        $obj->objectId = $objectId;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectId = $objectID;

        return $obj;
    }
}
