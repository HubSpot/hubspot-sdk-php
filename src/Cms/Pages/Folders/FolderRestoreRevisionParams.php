<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\Folders;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Takes a specified version of a landing page folder and restores it.
 *
 * @see HubSpotSDK\Services\Cms\Pages\FoldersService::restoreRevision()
 *
 * @phpstan-type FolderRestoreRevisionParamsShape = array{objectID: string}
 */
final class FolderRestoreRevisionParams implements BaseModel
{
    /** @use SdkModel<FolderRestoreRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new FolderRestoreRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderRestoreRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderRestoreRevisionParams)->withObjectID(...)
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
