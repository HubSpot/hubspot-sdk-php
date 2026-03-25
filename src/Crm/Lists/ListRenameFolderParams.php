<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ListsService::renameFolder()
 *
 * @phpstan-type ListRenameFolderParamsShape = array{newFolderName?: string|null}
 */
final class ListRenameFolderParams implements BaseModel
{
    /** @use SdkModel<ListRenameFolderParamsShape> */
    use SdkModel;
    use SdkParams;

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
        $self = new self;

        null !== $newFolderName && $self['newFolderName'] = $newFolderName;

        return $self;
    }

    public function withNewFolderName(string $newFolderName): self
    {
        $self = clone $this;
        $self['newFolderName'] = $newFolderName;

        return $self;
    }
}
