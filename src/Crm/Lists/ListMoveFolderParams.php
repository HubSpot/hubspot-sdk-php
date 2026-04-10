<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @see HubSpotSDK\Services\Crm\ListsService::moveFolder()
 *
 * @phpstan-type ListMoveFolderParamsShape = array{folderID: string}
 */
final class ListMoveFolderParams implements BaseModel
{
    /** @use SdkModel<ListMoveFolderParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $folderID;

    /**
     * `new ListMoveFolderParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListMoveFolderParams::with(folderID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListMoveFolderParams)->withFolderID(...)
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
    public static function with(string $folderID): self
    {
        $self = new self;

        $self['folderID'] = $folderID;

        return $self;
    }

    public function withFolderID(string $folderID): self
    {
        $self = clone $this;
        $self['folderID'] = $folderID;

        return $self;
    }
}
