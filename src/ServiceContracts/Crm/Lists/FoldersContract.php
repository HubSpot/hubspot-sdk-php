<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\ListFolderCreateResponse;
use HubspotSDK\Crm\Lists\ListFolderFetchResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface FoldersContract
{
    /**
     * @api
     *
     * @param string $name the name of the folder to be created
     * @param string $parentFolderID the folder this should be created in, if not specified will be created in the root folder 0
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $parentFolderID = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListFolderCreateResponse;

    /**
     * @api
     *
     * @param string $folderID The ID of the folder to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $folderID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $folderID the Id of the folder to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $folderID = '0',
        RequestOptions|array|null $requestOptions = null
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param string $newParentFolderID the ID for the target parent folder
     * @param string $folderID The ID of the folder to move
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function move(
        string $newParentFolderID,
        string $folderID,
        RequestOptions|array|null $requestOptions = null,
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param string $listID the Id of the list to move
     * @param string $newFolderID the Id of folder to move the list to, the root folder is Id 0
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function moveList(
        string $listID,
        string $newFolderID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $folderID The ID of the folder to rename
     * @param string $newFolderName the new name of the folder
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function rename(
        string $folderID,
        ?string $newFolderName = null,
        RequestOptions|array|null $requestOptions = null,
    ): ListFolderFetchResponse;
}
