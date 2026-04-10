<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\Crm\ListsService::listFolders()
 *
 * @phpstan-type ListListFoldersParamsShape = array{folderID?: string|null}
 */
final class ListListFoldersParams implements BaseModel
{
    /** @use SdkModel<ListListFoldersParamsShape> */
    use SdkModel;
    use SdkParams;

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

    public function withFolderID(string $folderID): self
    {
        $self = clone $this;
        $self['folderID'] = $folderID;

        return $self;
    }
}
