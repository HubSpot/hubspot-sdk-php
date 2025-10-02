<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type files_folder_input = array{
 *   name: string, parentFolderID?: string, parentPath?: string
 * }
 */
final class FilesFolderInput implements BaseModel
{
    /** @use SdkModel<files_folder_input> */
    use SdkModel;

    #[Api]
    public string $name;

    #[Api('parentFolderId', optional: true)]
    public ?string $parentFolderID;

    #[Api(optional: true)]
    public ?string $parentPath;

    /**
     * `new FilesFolderInput()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilesFolderInput::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilesFolderInput)->withName(...)
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

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withParentFolderID(string $parentFolderID): self
    {
        $obj = clone $this;
        $obj->parentFolderID = $parentFolderID;

        return $obj;
    }

    public function withParentPath(string $parentPath): self
    {
        $obj = clone $this;
        $obj->parentPath = $parentPath;

        return $obj;
    }
}
