<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Files;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Creates a folder.
 *
 * @see HubspotSDK\Services\Files\FilesService::create()
 *
 * @phpstan-type FileCreateParamsShape = array{
 *   name: string, parentFolderID?: string|null, parentPath?: string|null
 * }
 */
final class FileCreateParams implements BaseModel
{
    /** @use SdkModel<FileCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Desired name for the folder.
     */
    #[Required]
    public string $name;

    /**
     * FolderId of the parent of the created folder. If not specified, the folder will be created at the root level. parentFolderId and parentFolderPath cannot be set at the same time.
     */
    #[Optional('parentFolderId')]
    public ?string $parentFolderID;

    /**
     * Path of the parent of the created folder. If not specified the folder will be created at the root level. parentFolderPath and parentFolderId cannot be set at the same time.
     */
    #[Optional]
    public ?string $parentPath;

    /**
     * `new FileCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FileCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FileCreateParams)->withName(...)
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
        $self = new self;

        $self['name'] = $name;

        null !== $parentFolderID && $self['parentFolderID'] = $parentFolderID;
        null !== $parentPath && $self['parentPath'] = $parentPath;

        return $self;
    }

    /**
     * Desired name for the folder.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * FolderId of the parent of the created folder. If not specified, the folder will be created at the root level. parentFolderId and parentFolderPath cannot be set at the same time.
     */
    public function withParentFolderID(string $parentFolderID): self
    {
        $self = clone $this;
        $self['parentFolderID'] = $parentFolderID;

        return $self;
    }

    /**
     * Path of the parent of the created folder. If not specified the folder will be created at the root level. parentFolderPath and parentFolderId cannot be set at the same time.
     */
    public function withParentPath(string $parentPath): self
    {
        $self = clone $this;
        $self['parentPath'] = $parentPath;

        return $self;
    }
}
