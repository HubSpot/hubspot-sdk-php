<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Cms\Blogs\VersionUser;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type BlogShape from \HubspotSDK\Cms\Blogs\Settings\Blog
 * @phpstan-import-type VersionUserShape from \HubspotSDK\Cms\Blogs\VersionUser
 *
 * @phpstan-type BlogVersionShape = array{
 *   id: string,
 *   object: Blog|BlogShape,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser|VersionUserShape,
 * }
 */
final class BlogVersion implements BaseModel
{
    /** @use SdkModel<BlogVersionShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public Blog $object;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Required]
    public VersionUser $user;

    /**
     * `new BlogVersion()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BlogVersion::with(id: ..., object: ..., updatedAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BlogVersion)
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
