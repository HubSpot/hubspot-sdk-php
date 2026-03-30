<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages\Folders;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Takes a specified version of a landing page folder and restores it.
 *
 * @see HubspotSDK\Services\Cms\Pages\FoldersService::restoreFolderRevision()
 *
 * @phpstan-type FolderRestoreFolderRevisionParamsShape = array{objectID: string}
 */
final class FolderRestoreFolderRevisionParams implements BaseModel
{
    /** @use SdkModel<FolderRestoreFolderRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new FolderRestoreFolderRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderRestoreFolderRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderRestoreFolderRevisionParams)->withObjectID(...)
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
