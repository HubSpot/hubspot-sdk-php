<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ListsService::moveFolder()
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
