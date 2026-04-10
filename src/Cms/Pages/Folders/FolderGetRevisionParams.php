<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\Folders;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Retrieve a previous version of a folder, specified by the folder ID and revision ID.
 *
 * @see HubSpotSDK\Services\Cms\Pages\FoldersService::getRevision()
 *
 * @phpstan-type FolderGetRevisionParamsShape = array{objectID: string}
 */
final class FolderGetRevisionParams implements BaseModel
{
    /** @use SdkModel<FolderGetRevisionParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectID;

    /**
     * `new FolderGetRevisionParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderGetRevisionParams::with(objectID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderGetRevisionParams)->withObjectID(...)
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
