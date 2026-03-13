<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Lists;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Lists\Folders\FolderCreateParams;
use HubspotSDK\Crm\Lists\Folders\FolderGetParams;
use HubspotSDK\Crm\Lists\Folders\FolderMoveListParams;
use HubspotSDK\Crm\Lists\Folders\FolderMoveParams;
use HubspotSDK\Crm\Lists\Folders\FolderRenameParams;
use HubspotSDK\Crm\Lists\ListFolderCreateResponse;
use HubspotSDK\Crm\Lists\ListFolderFetchResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Lists\FoldersRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class FoldersRawService implements FoldersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a folder with the given information.
     *
     * @param array{name: string, parentFolderID?: string}|FolderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFolderCreateResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FolderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/lists/folders',
            body: (object) $parsed,
            options: $options,
            convert: ListFolderCreateResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes the folder with the given Id.
     *
     * @param string $folderID The ID of the folder to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $folderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['crm/v3/lists/folders/%1$s', $folderID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieves a folder and recursively includes all folders via the childNodes attribute.  The child lists field will be empty in all child nodes. Only the folder retrieved will include the child lists in that folder.
     *
     * @param array{folderID?: string}|FolderGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFolderFetchResponse>
     *
     * @throws APIException
     */
    public function get(
        array|FolderGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/lists/folders',
            query: Util::array_transform_keys($parsed, ['folderID' => 'folderId']),
            options: $options,
            convert: ListFolderFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * This moves the folder from its current location to a new location. It updates the parent of this folder to the new Id given.
     *
     * @param string $newParentFolderID the ID for the target parent folder
     * @param array{folderID: string}|FolderMoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFolderFetchResponse>
     *
     * @throws APIException
     */
    public function move(
        string $newParentFolderID,
        array|FolderMoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderMoveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $folderID = $parsed['folderID'];
        unset($parsed['folderID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'crm/v3/lists/folders/%1$s/move/%2$s', $folderID, $newParentFolderID,
            ],
            options: $options,
            convert: ListFolderFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * Given a list and a folder, the list will be moved to that folder.
     *
     * @param array{listID: string, newFolderID: string}|FolderMoveListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function moveList(
        array|FolderMoveListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderMoveListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'crm/v3/lists/folders/move-list',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Renames the given folderId with a new name.
     *
     * @param string $folderID The ID of the folder to rename
     * @param array{newFolderName?: string}|FolderRenameParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ListFolderFetchResponse>
     *
     * @throws APIException
     */
    public function rename(
        string $folderID,
        array|FolderRenameParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderRenameParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/folders/%1$s/rename', $folderID],
            query: $parsed,
            options: $options,
            convert: ListFolderFetchResponse::class,
        );
    }
}
