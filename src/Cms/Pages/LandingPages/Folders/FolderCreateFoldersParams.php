<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\LandingPages\Folders;

use HubSpotSDK\Cms\Pages\ContentFolder;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Create a batch of folders as detailed in the request body.
 *
 * @see HubSpotSDK\Services\Cms\Pages\LandingPages\FoldersService::createFolders()
 *
 * @phpstan-import-type ContentFolderShape from \HubSpotSDK\Cms\Pages\ContentFolder
 *
 * @phpstan-type FolderCreateFoldersParamsShape = array{
 *   inputs: list<ContentFolder|ContentFolderShape>
 * }
 */
final class FolderCreateFoldersParams implements BaseModel
{
    /** @use SdkModel<FolderCreateFoldersParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Content folders to input.
     *
     * @var list<ContentFolder> $inputs
     */
    #[Required(list: ContentFolder::class)]
    public array $inputs;

    /**
     * `new FolderCreateFoldersParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderCreateFoldersParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderCreateFoldersParams)->withInputs(...)
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
     *
     * @param list<ContentFolder|ContentFolderShape> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Content folders to input.
     *
     * @param list<ContentFolder|ContentFolderShape> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
