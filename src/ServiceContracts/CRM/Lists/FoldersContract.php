<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Lists\ListFolderCreateResponse;
use HubspotSDK\CRM\Lists\ListFolderFetchResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

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
        $name,
        $parentFolderID = omit,
        ?RequestOptions $requestOptions = null
    ): ListFolderCreateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ListFolderCreateResponse;

    /**
     * @api
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
        $folderID = omit,
        ?RequestOptions $requestOptions = null
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param string $folderID
     *
     * @throws APIException
     */
    public function move(
        string $newParentFolderID,
        $folderID,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function moveRaw(
        string $newParentFolderID,
        array $params,
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
        $listID,
        $newFolderID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function moveListRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $newFolderName the new name of the folder
     *
     * @throws APIException
     */
    public function rename(
        string $folderID,
        $newFolderName = omit,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function renameRaw(
        string $folderID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ListFolderFetchResponse;
}
