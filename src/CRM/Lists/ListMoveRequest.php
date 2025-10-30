<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Lists;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ListMoveRequestShape = array{listID: string, newFolderID: string}
 */
final class ListMoveRequest implements BaseModel
{
    /** @use SdkModel<ListMoveRequestShape> */
    use SdkModel;

    /**
     * The Id of the list to move.
     */
    #[Api('listId')]
    public string $listID;

    /**
     * The Id of folder to move the list to, the root folder is Id 0.
     */
    #[Api('newFolderId')]
    public string $newFolderID;

    /**
     * `new ListMoveRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListMoveRequest::with(listID: ..., newFolderID: ...)
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
    public static function with(string $listID, string $newFolderID): self
    {
        $obj = new self;

        $obj->listID = $listID;
        $obj->newFolderID = $newFolderID;

        return $obj;
    }

    /**
     * The Id of the list to move.
     */
    public function withListID(string $listID): self
    {
        $obj = clone $this;
        $obj->listID = $listID;

        return $obj;
    }

    /**
     * The Id of folder to move the list to, the root folder is Id 0.
     */
    public function withNewFolderID(string $newFolderID): self
    {
        $obj = clone $this;
        $obj->newFolderID = $newFolderID;

        return $obj;
    }
}
