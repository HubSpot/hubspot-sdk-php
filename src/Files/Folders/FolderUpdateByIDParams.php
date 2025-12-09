<?php

declare(strict_types=1);

namespace HubspotSDK\Files\Folders;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Update a folder's properties, identified by folder ID.
 *
 * @see HubspotSDK\Services\Files\FoldersService::updateByID()
 *
 * @phpstan-type FolderUpdateByIDParamsShape = array{
 *   name?: string, parentFolderId?: int
 * }
 */
final class FolderUpdateByIDParams implements BaseModel
{
    /** @use SdkModel<FolderUpdateByIDParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * New name. If specified the folder's name and fullPath will change. All children of the folder will be updated accordingly.
     */
    #[Optional]
    public ?string $name;

    /**
     * New parent folderId. If changed, the folder and all it's children will be moved into the specified folder. parentFolderId and parentFolderPath cannot be specified at the same time.
     */
    #[Optional]
    public ?int $parentFolderId;

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
        ?string $name = null,
        ?int $parentFolderId = null
    ): self {
        $obj = new self;

        null !== $name && $obj['name'] = $name;
        null !== $parentFolderId && $obj['parentFolderId'] = $parentFolderId;

        return $obj;
    }

    /**
     * New name. If specified the folder's name and fullPath will change. All children of the folder will be updated accordingly.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * New parent folderId. If changed, the folder and all it's children will be moved into the specified folder. parentFolderId and parentFolderPath cannot be specified at the same time.
     */
    public function withParentFolderID(int $parentFolderID): self
    {
        $obj = clone $this;
        $obj['parentFolderId'] = $parentFolderID;

        return $obj;
    }
}
