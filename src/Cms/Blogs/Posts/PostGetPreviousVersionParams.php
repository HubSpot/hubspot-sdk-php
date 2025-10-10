<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new PostGetPreviousVersionParams); // set properties as needed
 * $client->cms.blogs.posts->getPreviousVersion(...$params->toArray());
 * ```
 * Retrieve a previous version of a blog post.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.blogs.posts->getPreviousVersion(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Blogs\Posts->getPreviousVersion
 *
 * @phpstan-type post_get_previous_version_params = array{objectID: string}
 */
final class PostGetPreviousVersionParams implements BaseModel
{
    /** @use SdkModel<post_get_previous_version_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
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

        $obj->objectID = $objectID;

        return $obj;
    }

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }
}
