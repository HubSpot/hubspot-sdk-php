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
 * $params = (new PostRestorePreviousVersionToDraftParams); // set properties as needed
 * $client->cms.blogs.posts->restorePreviousVersionToDraft(...$params->toArray());
 * ```
 * Takes a specified version of a blog post, sets it as the new draft version of the blog post.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.blogs.posts->restorePreviousVersionToDraft(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Blogs\Posts->restorePreviousVersionToDraft
 *
 * @phpstan-type post_restore_previous_version_to_draft_params = array{
 *   objectID: string
 * }
 */
final class PostRestorePreviousVersionToDraftParams implements BaseModel
{
    /** @use SdkModel<post_restore_previous_version_to_draft_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $objectID;

    /**
     * `new PostRestorePreviousVersionToDraftParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostRestorePreviousVersionToDraftParams::with(objectID: ...)
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
