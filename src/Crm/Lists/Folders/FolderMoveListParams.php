<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\Folders;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Given a list and a folder, the list will be moved to that folder.
 *
 * @see HubspotSDK\Services\Crm\Lists\FoldersService::moveList()
 *
 * @phpstan-type FolderMoveListParamsShape = array{
 *   listID: string, newFolderID: string
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
    #[Required('listId')]
    public string $listID;

    /**
     * The Id of folder to move the list to, the root folder is Id 0.
     */
    #[Required('newFolderId')]
    public string $newFolderID;

    /**
     * `new FolderMoveListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FolderMoveListParams::with(listID: ..., newFolderID: ...)
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
    public static function with(string $listID, string $newFolderID): self
    {
        $obj = new self;

        $obj['listID'] = $listID;
        $obj['newFolderID'] = $newFolderID;

        return $obj;
    }

    /**
     * The Id of the list to move.
     */
    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj['listID'] = $listID;

        return $obj;
    }

    /**
     * The Id of folder to move the list to, the root folder is Id 0.
     */
    public function withNewFolderID(string $newFolderID): self
    {
        $obj = clone $this;
        $obj['newFolderID'] = $newFolderID;

        return $obj;
    }
}
