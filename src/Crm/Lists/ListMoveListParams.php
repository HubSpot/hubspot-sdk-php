<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Crm\ListsService::moveList()
 *
 * @phpstan-type ListMoveListParamsShape = array{
 *   listID: string, newFolderID: string
 * }
 */
final class ListMoveListParams implements BaseModel
{
    /** @use SdkModel<ListMoveListParamsShape> */
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
     * `new ListMoveListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ListMoveListParams::with(listID: ..., newFolderID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ListMoveListParams)->withListID(...)->withNewFolderID(...)
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
        $self = new self;

        $self['listID'] = $listID;
        $self['newFolderID'] = $newFolderID;

        return $self;
    }

    /**
     * The Id of the list to move.
     */
    public function withListID(string $listID): self
    {
        $self = clone $this;
        $self['listID'] = $listID;

        return $self;
    }

    /**
     * The Id of folder to move the list to, the root folder is Id 0.
     */
    public function withNewFolderID(string $newFolderID): self
    {
        $self = clone $this;
        $self['newFolderID'] = $newFolderID;

        return $self;
    }
}
