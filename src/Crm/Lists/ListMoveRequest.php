<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListMoveRequestShape = array{listId: string, newFolderId: string}
 */
final class ListMoveRequest implements BaseModel
{
    /** @use SdkModel<ListMoveRequestShape> */
    use SdkModel;

    /**
     * The Id of the list to move.
     */
    #[Required]
    public string $listId;

    /**
     * The Id of folder to move the list to, the root folder is Id 0.
     */
    #[Required]
    public string $newFolderId;

    /**
     * `new ListMoveRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListMoveRequest::with(listId: ..., newFolderId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListMoveRequest)->withListID(...)->withNewFolderID(...)
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
