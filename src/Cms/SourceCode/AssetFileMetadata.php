<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type AssetFileMetadataShape = array{
 *   id: string,
 *   createdAt: int,
 *   folder: bool,
 *   name: string,
 *   updatedAt: int,
 *   archivedAt?: int|null,
 *   children?: list<string>|null,
 *   hash?: string|null,
 * }
 */
final class AssetFileMetadata implements BaseModel
{
    /** @use SdkModel<AssetFileMetadataShape> */
    use SdkModel;

    /**
     * The path of the file in the CMS Developer File System.
     */
    #[Required]
    public string $id;

    /**
     * Timestamp of when the object was first created.
     */
    #[Required]
    public int $createdAt;

    /**
     * Determines whether or not this path points to a folder.
     */
    #[Required]
    public bool $folder;

    /**
     * The name of the file.
     */
    #[Required]
    public string $name;

    /**
     * Timestamp of when the object was last updated.
     */
    #[Required]
    public int $updatedAt;

    /**
     * Timestamp of when the object was archived (deleted).
     */
    #[Optional]
    public ?int $archivedAt;

    /**
     * If the object is a folder, contains the filenames of the files within the folder.
     *
     * @var list<string>|null $children
     */
    #[Optional(list: 'string')]
    public ?array $children;

    /**
     * A unique identifier for the file's content, used to verify data integrity.
     */
    #[Optional]
    public ?string $hash;

    /**
     * `new AssetFileMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssetFileMetadata::with(
     *   id: ..., createdAt: ..., folder: ..., name: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssetFileMetadata)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withFolder(...)
     *   ->withName(...)
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
     *
     * @param list<string>|null $children
     */
    public static function with(
        string $id,
        int $createdAt,
        bool $folder,
        string $name,
        int $updatedAt,
        ?int $archivedAt = null,
        ?array $children = null,
        ?string $hash = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['folder'] = $folder;
        $self['name'] = $name;
        $self['updatedAt'] = $updatedAt;

        null !== $archivedAt && $self['archivedAt'] = $archivedAt;
        null !== $children && $self['children'] = $children;
        null !== $hash && $self['hash'] = $hash;

        return $self;
    }

    /**
     * The path of the file in the CMS Developer File System.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Timestamp of when the object was first created.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Determines whether or not this path points to a folder.
     */
    public function withFolder(bool $folder): self
    {
        $self = clone $this;
        $self['folder'] = $folder;

        return $self;
    }

    /**
     * The name of the file.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Timestamp of when the object was last updated.
     */
    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Timestamp of when the object was archived (deleted).
     */
    public function withArchivedAt(int $archivedAt): self
    {
        $self = clone $this;
        $self['archivedAt'] = $archivedAt;

        return $self;
    }

    /**
     * If the object is a folder, contains the filenames of the files within the folder.
     *
     * @param list<string> $children
     */
    public function withChildren(array $children): self
    {
        $self = clone $this;
        $self['children'] = $children;

        return $self;
    }

    /**
     * A unique identifier for the file's content, used to verify data integrity.
     */
    public function withHash(string $hash): self
    {
        $self = clone $this;
        $self['hash'] = $hash;

        return $self;
    }
}
