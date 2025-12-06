<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\VersionUser;

/**
 * Model definition for a content folder version. Contains metadata describing the version of the folder. It can be used to view edit history of a folder.
 *
 * @phpstan-type VersionContentFolderShape = array{
 *   id: string,
 *   object: ContentFolder,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser,
 * }
 */
final class VersionContentFolder implements BaseModel
{
    /** @use SdkModel<VersionContentFolderShape> */
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
    public ContentFolder $object;

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
     * VersionContentFolder::with(id: ..., object: ..., updatedAt: ..., user: ...)
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
     *
     * @param ContentFolder|array{
     *   id: string,
     *   category: int,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   name: string,
     *   parentFolderId: int,
     *   updated: \DateTimeInterface,
     * } $object
     * @param VersionUser|array{id: string, email: string, fullName: string} $user
     */
    public static function with(
        string $id,
        ContentFolder|array $object,
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
     * ID of this folder version.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Model definition for a content folder.
     *
     * @param ContentFolder|array{
     *   id: string,
     *   category: int,
     *   created: \DateTimeInterface,
     *   deletedAt: \DateTimeInterface,
     *   name: string,
     *   parentFolderId: int,
     *   updated: \DateTimeInterface,
     * } $object
     */
    public function withObject(ContentFolder|array $object): self
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
