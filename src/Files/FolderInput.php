<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Object for creating a folder.
 *
 * @phpstan-type FolderInputShape = array{
 *   name: string, parentFolderId?: string|null, parentPath?: string|null
 * }
 */
final class FolderInput implements BaseModel
{
    /** @use SdkModel<FolderInputShape> */
    use SdkModel;

    /**
     * Desired name for the folder.
     */
    #[Api]
    public string $name;

    /**
     * FolderId of the parent of the created folder. If not specified, the folder will be created at the root level. parentFolderId and parentFolderPath cannot be set at the same time.
     */
    #[Api(optional: true)]
    public ?string $parentFolderId;

    /**
     * Path of the parent of the created folder. If not specified the folder will be created at the root level. parentFolderPath and parentFolderId cannot be set at the same time.
     */
    #[Api(optional: true)]
    public ?string $parentPath;

    /**
     * `new FolderInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderInput::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderInput)->withName(...)
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
        string $name,
        ?string $parentFolderId = null,
        ?string $parentPath = null
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $parentFolderId && $obj->parentFolderId = $parentFolderId;
        null !== $parentPath && $obj->parentPath = $parentPath;

        return $obj;
    }

    /**
     * Desired name for the folder.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * FolderId of the parent of the created folder. If not specified, the folder will be created at the root level. parentFolderId and parentFolderPath cannot be set at the same time.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj->parentFolderId = $parentFolderID;

        return $obj;
    }

    /**
     * Path of the parent of the created folder. If not specified the folder will be created at the root level. parentFolderPath and parentFolderId cannot be set at the same time.
     */
    public function withParentPath(string $parentPath): self
    {
        $obj = clone $this;
        $obj->parentPath = $parentPath;

        return $obj;
    }
}
