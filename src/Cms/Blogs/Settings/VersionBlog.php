<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Cms\Blogs\Settings\Blog\Language;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\VersionUser;

/**
 * Model definition for a Version Blog. Contains metadata describing the version of the Blog. It can be used to view edit history of the settings.
 *
 * @phpstan-type VersionBlogShape = array{
 *   id: string, object: Blog, updatedAt: \DateTimeInterface, user: VersionUser
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

    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
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
     * @param Blog|array{
     *   id: string,
     *   absoluteURL: string,
     *   allowComments: bool,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   description: string,
     *   htmlTitle: string,
     *   language: value-of<Language>,
     *   name: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publicTitle: string,
     *   slug: string,
     *   translatedFromID: string,
     *   updated: \DateTimeInterface,
     * } $object
     * @param VersionUser|array{id: string, email: string, fullName: string} $user
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
     * @param Blog|array{
     *   id: string,
     *   absoluteURL: string,
     *   allowComments: bool,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   description: string,
     *   htmlTitle: string,
     *   language: value-of<Language>,
     *   name: string,
     *   publicAccessRules: list<mixed>,
     *   publicAccessRulesEnabled: bool,
     *   publicTitle: string,
     *   slug: string,
     *   translatedFromID: string,
     *   updated: \DateTimeInterface,
     * } $object
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
     * Model definition for a version user. Contains addition information about the user who created a version.
     *
     * @param VersionUser|array{id: string, email: string, fullName: string} $user
     */
    public function withUser(VersionUser|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
