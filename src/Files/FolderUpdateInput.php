<?php

declare(strict_types=1);

namespace HubspotSDK\Files;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Object for updating folders.
 *
 * @phpstan-type FolderUpdateInputShape = array{
 *   name?: string|null, parentFolderId?: int|null
 * }
 */
final class FolderUpdateInput implements BaseModel
{
    /** @use SdkModel<FolderUpdateInputShape> */
    use SdkModel;

    /**
     * New name. If specified the folder's name and fullPath will change. All children of the folder will be updated accordingly.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * New parent folderId. If changed, the folder and all it's children will be moved into the specified folder. parentFolderId and parentFolderPath cannot be specified at the same time.
     */
    #[Api(optional: true)]
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
