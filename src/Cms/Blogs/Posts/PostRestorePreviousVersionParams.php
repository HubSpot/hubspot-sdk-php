<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Restores a blog post to one of its previous versions.
 *
 * @see HubspotSDK\Services\Cms\Blogs\PostsService::restorePreviousVersion()
 *
 * @phpstan-type PostRestorePreviousVersionParamsShape = array{objectId: string}
 */
final class PostRestorePreviousVersionParams implements BaseModel
{
    /** @use SdkModel<PostRestorePreviousVersionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectId;

    /**
     * `new PostRestorePreviousVersionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostRestorePreviousVersionParams::with(objectId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostRestorePreviousVersionParams)->withObjectID(...)
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
