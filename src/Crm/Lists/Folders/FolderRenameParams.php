<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Folders;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Renames the given folderId with a new name.
 *
 * @see HubspotSDK\Services\Crm\Lists\FoldersService::rename()
 *
 * @phpstan-type FolderRenameParamsShape = array{newFolderName?: string}
 */
final class FolderRenameParams implements BaseModel
{
    /** @use SdkModel<FolderRenameParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The new name of the folder.
     */
    #[Optional]
    public ?string $newFolderName;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $newFolderName = null): self
    {
        $obj = new self;

        null !== $newFolderName && $obj['newFolderName'] = $newFolderName;

        return $obj;
    }

    /**
     * The new name of the folder.
     */
    public function withNewFolderName(string $newFolderName): self
    {
        $obj = clone $this;
        $obj['newFolderName'] = $newFolderName;

        return $obj;
    }
}
