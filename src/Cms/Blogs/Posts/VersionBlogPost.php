<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\VersionUser;

/**
 * Model definition of a version of a blog post.
 *
 * @phpstan-import-type BlogPostShape from \HubspotSDK\Cms\Blogs\Posts\BlogPost
 * @phpstan-import-type VersionUserShape from \HubspotSDK\VersionUser
 *
 * @phpstan-type VersionBlogPostShape = array{
 *   id: string,
 *   object: BlogPost|BlogPostShape,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser|VersionUserShape,
 * }
 */
final class VersionBlogPost implements BaseModel
{
    /** @use SdkModel<VersionBlogPostShape> */
    use SdkModel;

    /**
     * The id of the version.
     */
    #[Required]
    public string $id;

    /**
     * Model definition for a Blog Post.
     */
    #[Required]
    public BlogPost $object;

    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
    #[Required]
    public VersionUser $user;

    /**
     * `new VersionBlogPost()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionBlogPost::with(id: ..., object: ..., updatedAt: ..., user: ...)
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
     *
     * @param BlogPostShape $object
     * @param VersionUserShape $user
     */
    public static function with(
        string $id,
        BlogPost|array $object,
        \DateTimeInterface $updatedAt,
        VersionUser|array $user,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['object'] = $object;
        $self['updatedAt'] = $updatedAt;
        $self['user'] = $user;

        return $self;
    }

    /**
     * The id of the version.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Model definition for a Blog Post.
     *
     * @param BlogPostShape $object
     */
    public function withObject(BlogPost|array $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     *
     * @param VersionUserShape $user
     */
    public function withUser(VersionUser|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
