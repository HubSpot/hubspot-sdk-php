<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Blogs\Settings;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\VersionUser;

/**
 * @phpstan-import-type BlogShape from \HubSpotSDK\Cms\Blogs\Settings\Blog
 * @phpstan-import-type VersionUserShape from \HubSpotSDK\VersionUser
 *
 * @phpstan-type VersionBlogShape = array{
 *   id: string,
 *   object: Blog|BlogShape,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser|VersionUserShape,
 * }
 */
final class VersionBlog implements BaseModel
{
    /** @use SdkModel<VersionBlogShape> */
    use SdkModel;

    /**
     * The id of the version.
     */
    #[Required]
    public string $id;

    #[Required]
    public Blog $object;

    /**
     * The timestamp (ISO8601 format) when this blog version was updated.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Required]
    public VersionUser $user;

    /**
     * `new VersionBlog()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionBlog::with(id: ..., object: ..., updatedAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionBlog)
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
     * @param Blog|BlogShape $object
     * @param VersionUser|VersionUserShape $user
     */
    public static function with(
        string $id,
        Blog|array $object,
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
     * @param Blog|BlogShape $object
     */
    public function withObject(Blog|array $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }

    /**
     * The timestamp (ISO8601 format) when this blog version was updated.
     */
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
