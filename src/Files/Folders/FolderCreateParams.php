<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Folders;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Creates a folder.
 *
 * @see HubspotSDK\Files\Folders->create
 *
 * @phpstan-type folder_create_params = array{
 *   name: string, parentFolderID?: string, parentPath?: string
 * }
 */
final class FolderCreateParams implements BaseModel
{
    /** @use SdkModel<folder_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Desired name for the folder.
     */
    #[Api]
    public string $name;

    /**
     * FolderId of the parent of the created folder. If not specified, the folder will be created at the root level. parentFolderId and parentFolderPath cannot be set at the same time.
     */
    #[Api('parentFolderId', optional: true)]
    public ?string $parentFolderID;

    /**
     * Path of the parent of the created folder. If not specified the folder will be created at the root level. parentFolderPath and parentFolderId cannot be set at the same time.
     */
    #[Api(optional: true)]
    public ?string $parentPath;

    /**
     * `new FolderCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderCreateParams)->withName(...)
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
        ?string $parentFolderID = null,
        ?string $parentPath = null
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $parentFolderID && $obj->parentFolderID = $parentFolderID;
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
        $obj->parentFolderID = $parentFolderID;

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
