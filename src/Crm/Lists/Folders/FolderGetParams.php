<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Folders;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieves a folder and recursively includes all folders via the childNodes attribute.  The child lists field will be empty in all child nodes. Only the folder retrieved will include the child lists in that folder.
 *
 * @see HubspotSDK\Services\Crm\Lists\FoldersService::get()
 *
 * @phpstan-type FolderGetParamsShape = array{folderID?: string|null}
 */
final class FolderGetParams implements BaseModel
{
    /** @use SdkModel<FolderGetParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The Id of the folder to retrieve.
     */
    #[Optional]
    public ?string $folderID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $folderID = null): self
    {
        $self = new self;

        null !== $folderID && $self['folderID'] = $folderID;

        return $self;
    }

    /**
     * The Id of the folder to retrieve.
     */
    public function withFolderID(string $folderID): self
    {
        $self = clone $this;
        $self['folderID'] = $folderID;

        return $self;
    }
}
