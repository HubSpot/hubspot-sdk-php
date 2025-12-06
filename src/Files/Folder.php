<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type FolderShape = array{
 *   id: string,
 *   archived: bool,
 *   createdAt: \DateTimeInterface,
 *   updatedAt: \DateTimeInterface,
 *   archivedAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   parentFolderId?: string|null,
 *   path?: string|null,
 * }
 */
final class Folder implements BaseModel
{
    /** @use SdkModel<FolderShape> */
    use SdkModel;

    /**
     * ID of the folder.
     */
    #[Api]
    public string $id;

    /**
     * Marks whether the folder is deleted or not.
     */
    #[Api]
    public bool $archived;

    /**
     * Timestamp of folder creation.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * Timestamp of the latest update to the folder.
     */
    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * Timestamp of folder deletion.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $archivedAt;

    /**
     * Name of the folder.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * ID of the parent folder.
     */
    #[Api(optional: true)]
    public ?string $parentFolderId;

    /**
     * Path of the folder in the file manager.
     */
    #[Api(optional: true)]
    public ?string $path;

    /**
     * `new Folder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Folder::with(id: ..., archived: ..., createdAt: ..., updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Folder)
     *   ->withID(...)
     *   ->withArchived(...)
     *   ->withCreatedAt(...)
     *   ->withUpdatedAt(...)
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
        bool $archived,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        ?\DateTimeInterface $archivedAt = null,
        ?string $name = null,
        ?string $parentFolderId = null,
        ?string $path = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['archived'] = $archived;
        $obj['createdAt'] = $createdAt;
        $obj['updatedAt'] = $updatedAt;

        null !== $archivedAt && $obj['archivedAt'] = $archivedAt;
        null !== $name && $obj['name'] = $name;
        null !== $parentFolderId && $obj['parentFolderId'] = $parentFolderId;
        null !== $path && $obj['path'] = $path;

        return $obj;
    }

    /**
     * ID of the folder.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Marks whether the folder is deleted or not.
     */
    public function withArchived(bool $archived): self
    {
        $obj = clone $this;
        $obj['archived'] = $archived;

        return $obj;
    }

    /**
     * Timestamp of folder creation.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Timestamp of the latest update to the folder.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Timestamp of folder deletion.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $obj = clone $this;
        $obj['archivedAt'] = $archivedAt;

        return $obj;
    }

    /**
     * Name of the folder.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * ID of the parent folder.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj['parentFolderId'] = $parentFolderID;

        return $obj;
    }

    /**
     * Path of the folder in the file manager.
     */
    public function withPath(string $path): self
    {
        $obj = clone $this;
        $obj['path'] = $path;

        return $obj;
    }
}
