<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Cms\Blogs\Settings\Blog\Language;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\VersionUser;

/**
 * Model definition for a Version Blog. Contains metadata describing the version of the Blog. It can be used to view edit history of the settings.
 *
 * @phpstan-type VersionBlogShape = array{
 *   id: string, object: Blog, updatedAt: \DateTimeInterface, user: VersionUser
 * }
 */
final class VersionBlog implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VersionBlogShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The id of the version.
     */
    #[Api]
    public string $id;

    #[Api]
    public Blog $object;

    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
    #[Api]
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
     *   absoluteUrl: string,
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
     *   translatedFromId: string,
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['object'] = $object;
        $obj['updatedAt'] = $updatedAt;
        $obj['user'] = $user;

        return $obj;
    }

    /**
     * The id of the version.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param Blog|array{
     *   id: string,
     *   absoluteUrl: string,
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
     *   translatedFromId: string,
     *   updated: \DateTimeInterface,
     * } $object
     */
    public function withObject(Blog|array $object): self
    {
        $obj = clone $this;
        $obj['object'] = $object;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     *
     * @param VersionUser|array{id: string, email: string, fullName: string} $user
     */
    public function withUser(VersionUser|array $user): self
    {
        $obj = clone $this;
        $obj['user'] = $user;

        return $obj;
    }
}
