<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Posts;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\VersionUser;

/**
 * @phpstan-import-type BlogPostShape from \HubspotSDK\Cms\Blogs\Posts\BlogPost
 * @phpstan-import-type VersionUserShape from \HubspotSDK\VersionUser
 *
 * @phpstan-type BlogPostVersionShape = array{
 *   id: string,
 *   object: BlogPost|BlogPostShape,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser|VersionUserShape,
 * }
 */
final class BlogPostVersion implements BaseModel
{
    /** @use SdkModel<BlogPostVersionShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public BlogPost $object;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Required]
    public VersionUser $user;

    /**
     * `new BlogPostVersion()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogPostVersion::with(id: ..., object: ..., updatedAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogPostVersion)
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
     * @param BlogPost|BlogPostShape $object
     * @param VersionUser|VersionUserShape $user
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

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param BlogPost|BlogPostShape $object
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
     * @param VersionUser|VersionUserShape $user
     */
    public function withUser(VersionUser|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
