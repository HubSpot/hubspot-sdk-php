<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Cms\VersionUser;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Model definition for a content folder version. Contains metadata describing the version of the folder. It can be used to view edit history of a folder.
 *
 * @phpstan-type version_content_folder = array{
 *   id: string,
 *   object1: ContentFolder,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser,
 * }
 */
final class VersionContentFolder implements BaseModel
{
    /** @use SdkModel<version_content_folder> */
    use SdkModel;

    /**
     * ID of this folder version.
     */
    #[Api]
    public string $id;

    /**
     * Model definition for a content folder.
     */
    #[Api]
    public ContentFolder $object1;

    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
    #[Api]
    public VersionUser $user;

    /**
     * `new VersionContentFolder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionContentFolder::with(id: ..., object1: ..., updatedAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionContentFolder)
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
        ContentFolder $object1,
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

    /**
     * ID of this folder version.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Model definition for a content folder.
     */
    public function withObject(ContentFolder $object1): self
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

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
    public function withUser(VersionUser $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }
}
