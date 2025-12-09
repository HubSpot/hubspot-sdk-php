<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Folders;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * This moves the folder from its current location to a new location. It updates the parent of this folder to the new Id given.
 *
 * @see HubspotSDK\Services\Crm\Lists\FoldersService::move()
 *
 * @phpstan-type FolderMoveParamsShape = array{folderID: string}
 */
final class FolderMoveParams implements BaseModel
{
    /** @use SdkModel<FolderMoveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $folderID;

    /**
     * `new FolderMoveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderMoveParams::with(folderID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderMoveParams)->withFolderID(...)
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
        $obj = new self;

        $obj['folderID'] = $folderID;

        return $obj;
    }

    public function withFolderID(string $folderID): self
    {
        $obj = clone $this;
        $obj['folderID'] = $folderID;

        return $obj;
    }
}
