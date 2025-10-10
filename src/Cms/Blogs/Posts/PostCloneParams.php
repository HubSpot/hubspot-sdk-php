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
 * $params = (new PostCloneParams); // set properties as needed
 * $client->cms.blogs.posts->clone(...$params->toArray());
 * ```
 * Clone a blog post.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->cms.blogs.posts->clone(...$params->toArray());`
 *
 * @see HubspotSDK\Cms\Blogs\Posts->clone
 *
 * @phpstan-type post_clone_params = array{id: string, cloneName?: string}
 */
final class PostCloneParams implements BaseModel
{
    /** @use SdkModel<post_clone_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $id;

    #[Api(optional: true)]
    public ?string $cloneName;

    /**
     * `new PostCloneParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PostCloneParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PostCloneParams)->withID(...)
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
    public static function with(string $id, ?string $cloneName = null): self
    {
        $obj = new self;

        $obj->id = $id;

        null !== $cloneName && $obj->cloneName = $cloneName;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCloneName(string $cloneName): self
    {
        $obj = clone $this;
        $obj->cloneName = $cloneName;

        return $obj;
    }
}
