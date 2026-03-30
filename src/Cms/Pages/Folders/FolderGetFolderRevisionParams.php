<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\Folders;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a previous version of a folder, specified by the folder ID and revision ID.
 *
 * @see HubspotSDK\Services\Cms\Pages\FoldersService::getFolderRevision()
 *
 * @phpstan-type FolderGetFolderRevisionParamsShape = array{objectID: string}
 */
final class FolderGetFolderRevisionParams implements BaseModel
{
    /** @use SdkModel<FolderGetFolderRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new FolderGetFolderRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderGetFolderRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderGetFolderRevisionParams)->withObjectID(...)
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
    public static function with(string $objectID): self
    {
        $self = new self;

        $self['objectID'] = $objectID;

        return $self;
    }

    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }
}
