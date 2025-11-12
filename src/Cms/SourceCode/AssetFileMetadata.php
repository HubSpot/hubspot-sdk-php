<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\SourceCode;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

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
final class AssetFileMetadata implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AssetFileMetadataShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The path of the file in the CMS Developer File System.
     */
    #[Api]
    public string $id;

    /**
     * Timestamp of when the object was first created.
     */
    #[Api]
    public int $createdAt;

    /**
     * Determines whether or not this path points to a folder.
     */
    #[Api]
    public bool $folder;

    /**
     * The name of the file.
     */
    #[Api]
    public string $name;

    /**
     * Timestamp of when the object was last updated.
     */
    #[Api]
    public int $updatedAt;

    /**
     * Timestamp of when the object was archived (deleted).
     */
    #[Api(optional: true)]
    public ?int $archivedAt;

    /**
     * If the object is a folder, contains the filenames of the files within the folder.
     *
     * @var list<string>|null $children
     */
    #[Api(list: 'string', optional: true)]
    public ?array $children;

    #[Api(optional: true)]
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
     * @param list<string> $children
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
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->folder = $folder;
        $obj->name = $name;
        $obj->updatedAt = $updatedAt;

        null !== $archivedAt && $obj->archivedAt = $archivedAt;
        null !== $children && $obj->children = $children;
        null !== $hash && $obj->hash = $hash;

        return $obj;
    }

    /**
     * The path of the file in the CMS Developer File System.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Timestamp of when the object was first created.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Determines whether or not this path points to a folder.
     */
    public function withFolder(bool $folder): self
    {
        $obj = clone $this;
        $obj->folder = $folder;

        return $obj;
    }

    /**
     * The name of the file.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Timestamp of when the object was last updated.
     */
    public function withUpdatedAt(int $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Timestamp of when the object was archived (deleted).
     */
    public function withArchivedAt(int $archivedAt): self
    {
        $obj = clone $this;
        $obj->archivedAt = $archivedAt;

        return $obj;
    }

    /**
     * If the object is a folder, contains the filenames of the files within the folder.
     *
     * @param list<string> $children
     */
    public function withChildren(array $children): self
    {
        $obj = clone $this;
        $obj->children = $children;

        return $obj;
    }

    public function withHash(string $hash): self
    {
        $obj = clone $this;
        $obj->hash = $hash;

        return $obj;
    }
}
