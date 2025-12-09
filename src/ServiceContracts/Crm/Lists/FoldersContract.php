<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\ListFolderCreateResponse;
use HubspotSDK\Crm\Lists\ListFolderFetchResponse;
use HubspotSDK\RequestOptions;

interface FoldersContract
{
    /**
     * @api
     *
     * @param string $name the name of the folder to be created
     * @param string $parentFolderID the folder this should be created in, if not specified will be created in the root folder 0
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $parentFolderID = null,
        ?RequestOptions $requestOptions = null,
    ): ListFolderCreateResponse;

    /**
     * @api
     *
     * @param string $folderID The ID of the folder to delete
     *
     * @throws APIException
     */
    public function delete(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $folderID the Id of the folder to retrieve
     *
     * @throws APIException
     */
    public function get(
        string $folderID = '0',
        ?RequestOptions $requestOptions = null
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param string $newParentFolderID the ID for the target parent folder
     * @param string $folderID The ID of the folder to move
     *
     * @throws APIException
     */
    public function move(
        string $newParentFolderID,
        string $folderID,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param string $listID the Id of the list to move
     * @param string $newFolderID the Id of folder to move the list to, the root folder is Id 0
     *
     * @throws APIException
     */
    public function moveList(
        string $listID,
        string $newFolderID,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $folderID The ID of the folder to rename
     * @param string $newFolderName the new name of the folder
     *
     * @throws APIException
     */
    public function rename(
        string $folderID,
        ?string $newFolderName = null,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse;
}
