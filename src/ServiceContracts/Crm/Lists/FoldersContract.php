<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Lists;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\Folders\FolderCreateParams;
use HubspotSDK\Crm\Lists\Folders\FolderGetParams;
use HubspotSDK\Crm\Lists\Folders\FolderMoveListParams;
use HubspotSDK\Crm\Lists\Folders\FolderMoveParams;
use HubspotSDK\Crm\Lists\Folders\FolderRenameParams;
use HubspotSDK\Crm\Lists\ListFolderCreateResponse;
use HubspotSDK\Crm\Lists\ListFolderFetchResponse;
use HubspotSDK\RequestOptions;

interface FoldersContract
{
    /**
     * @api
     *
     * @param array<mixed>|FolderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FolderCreateParams $params,
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
     * @param array<mixed>|FolderGetParams $params
     *
     * @throws APIException
     */
    public function get(
        array|FolderGetParams $params,
        ?RequestOptions $requestOptions = null
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param array<mixed>|FolderMoveParams $params
     *
     * @throws APIException
     */
    public function move(
        string $newParentFolderID,
        array|FolderMoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse;

    /**
     * @api
     *
     * @param array<mixed>|FolderMoveListParams $params
     *
     * @throws APIException
     */
    public function moveList(
        array|FolderMoveListParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|FolderRenameParams $params
     *
     * @throws APIException
     */
    public function rename(
        string $folderID,
        array|FolderRenameParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse;
}
