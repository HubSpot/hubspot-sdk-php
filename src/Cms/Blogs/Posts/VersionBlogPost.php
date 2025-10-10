<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\VersionUser;

/**
 * @phpstan-type version_blog_post = array{
 *   id: string,
 *   object1: BlogPost,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser,
 * }
 */
final class VersionBlogPost implements BaseModel, ResponseConverter
{
    /** @use SdkModel<version_blog_post> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public string $id;

    #[Api]
    public BlogPost $object1;

    #[Api]
    public \DateTimeInterface $updatedAt;

    #[Api]
    public VersionUser $user;

    /**
     * `new VersionBlogPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionBlogPost::with(id: ..., object1: ..., updatedAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionBlogPost)
     *   ->withID(...)
     *   ->withObject(...)
     *   ->withUpdatedAt(...)
     *   ->withUser(...)
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
    public static function with(
        string $id,
        BlogPost $object1,
        \DateTimeInterface $updatedAt,
        VersionUser $user,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->object1 = $object1;
        $obj->updatedAt = $updatedAt;
        $obj->user = $user;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withObject(BlogPost $object1): self
    {
        $obj = clone $this;
        $obj->object1 = $object1;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withUser(VersionUser $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }
}
