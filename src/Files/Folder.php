<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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
 *   parentFolderID?: string|null,
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
    #[Required]
    public string $id;

    /**
     * Marks whether the folder is deleted or not.
     */
    #[Required]
    public bool $archived;

    /**
     * Timestamp of folder creation.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * Timestamp of the latest update to the folder.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * Timestamp of folder deletion.
     */
    #[Optional]
    public ?\DateTimeInterface $archivedAt;

    /**
     * Name of the folder.
     */
    #[Optional]
    public ?string $name;

    /**
     * ID of the parent folder.
     */
    #[Optional('parentFolderId')]
    public ?string $parentFolderID;

    /**
     * Path of the folder in the file manager.
     */
    #[Optional]
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
        ?string $parentFolderID = null,
        ?string $path = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['archived'] = $archived;
        $self['createdAt'] = $createdAt;
        $self['updatedAt'] = $updatedAt;

        null !== $archivedAt && $self['archivedAt'] = $archivedAt;
        null !== $name && $self['name'] = $name;
        null !== $parentFolderID && $self['parentFolderID'] = $parentFolderID;
        null !== $path && $self['path'] = $path;

        return $self;
    }

    /**
     * ID of the folder.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Marks whether the folder is deleted or not.
     */
    public function withArchived(bool $archived): self
    {
        $self = clone $this;
        $self['archived'] = $archived;

        return $self;
    }

    /**
     * Timestamp of folder creation.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Timestamp of the latest update to the folder.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Timestamp of folder deletion.
     */
    public function withArchivedAt(\DateTimeInterface $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    /**
     * Name of the folder.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * ID of the parent folder.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $self = clone $this;
        $self['parentFolderID'] = $parentFolderID;

        return $self;
    }

    /**
     * Path of the folder in the file manager.
     */
    public function withPath(string $path): self
    {
        $self = clone $this;
        $self['path'] = $path;

        return $self;
    }
}
