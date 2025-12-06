<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Folders;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Given a list and a folder, the list will be moved to that folder.
 *
 * @see HubspotSDK\Services\Crm\Lists\FoldersService::moveList()
 *
 * @phpstan-type FolderMoveListParamsShape = array{
 *   listId: string, newFolderId: string
 * }
 */
final class FolderMoveListParams implements BaseModel
{
    /** @use SdkModel<FolderMoveListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The Id of the list to move.
     */
    #[Api]
    public string $listId;

    /**
     * The Id of folder to move the list to, the root folder is Id 0.
     */
    #[Api]
    public string $newFolderId;

    /**
     * `new FolderMoveListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderMoveListParams::with(listId: ..., newFolderId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FolderMoveListParams)->withListID(...)->withNewFolderID(...)
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
    public static function with(string $listId, string $newFolderId): self
    {
        $obj = new self;

        $obj['listId'] = $listId;
        $obj['newFolderId'] = $newFolderId;

        return $obj;
    }

    /**
     * The Id of the list to move.
     */
    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj['listId'] = $listID;

        return $obj;
    }

    /**
     * The Id of folder to move the list to, the root folder is Id 0.
     */
    public function withNewFolderID(string $newFolderID): self
    {
        $obj = clone $this;
        $obj['newFolderId'] = $newFolderID;

        return $obj;
    }
}
