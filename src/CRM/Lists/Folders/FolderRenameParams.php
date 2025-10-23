<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists\Folders;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Renames the given folderId with a new name.
 *
 * @see HubspotSDK\CRM\Lists\Folders->rename
 *
 * @phpstan-type folder_rename_params = array{newFolderName?: string}
 */
final class FolderRenameParams implements BaseModel
{
    /** @use SdkModel<folder_rename_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The new name of the folder.
     */
    #[Api(optional: true)]
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

        null !== $newFolderName && $obj->newFolderName = $newFolderName;

        return $obj;
    }

    /**
     * The new name of the folder.
     */
    public function withNewFolderName(string $newFolderName): self
    {
        $obj = clone $this;
        $obj->newFolderName = $newFolderName;

        return $obj;
    }
}
