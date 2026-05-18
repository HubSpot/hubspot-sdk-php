<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages\LandingPages\Folders;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * Delete a batch of folders as specified in the request body.
 *
 * @see HubSpotSDK\Services\Cms\Pages\LandingPages\FoldersService::deleteFolders()
 *
 * @phpstan-type FolderDeleteFoldersParamsShape = array{inputs: list<string>}
 */
final class FolderDeleteFoldersParams implements BaseModel
{
    /** @use SdkModel<FolderDeleteFoldersParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Strings to input.
     *
     * @var list<string> $inputs
     */
    #[Required(list: 'string')]
    public array $inputs;

    /**
     * `new FolderDeleteFoldersParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderDeleteFoldersParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderDeleteFoldersParams)->withInputs(...)
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
     * @param list<string> $inputs
     */
    public static function with(array $inputs): self
    {
        $self = new self;

        $self['inputs'] = $inputs;

        return $self;
    }

    /**
     * Strings to input.
     *
     * @param list<string> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $self = clone $this;
        $self['inputs'] = $inputs;

        return $self;
    }
}
