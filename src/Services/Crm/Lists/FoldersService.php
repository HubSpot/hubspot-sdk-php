<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Lists;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Lists\Folders\FolderCreateParams;
use HubspotSDK\Crm\Lists\Folders\FolderGetParams;
use HubspotSDK\Crm\Lists\Folders\FolderMoveListParams;
use HubspotSDK\Crm\Lists\Folders\FolderMoveParams;
use HubspotSDK\Crm\Lists\Folders\FolderRenameParams;
use HubspotSDK\Crm\Lists\ListFolderCreateResponse;
use HubspotSDK\Crm\Lists\ListFolderFetchResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Lists\FoldersContract;

final class FoldersService implements FoldersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a folder with the given information.
     *
     * @param array{name: string, parentFolderId?: string}|FolderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FolderCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ListFolderCreateResponse {
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
     * @throws APIException
     */
    public function delete(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
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
     * @param array{folderId?: string}|FolderGetParams $params
     *
     * @throws APIException
     */
    public function get(
        array|FolderGetParams $params,
        ?RequestOptions $requestOptions = null
    ): ListFolderFetchResponse {
        [$parsed, $options] = FolderGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'crm/v3/lists/folders',
            query: $parsed,
            options: $options,
            convert: ListFolderFetchResponse::class,
        );
    }

    /**
     * @api
     *
     * This moves the folder from its current location to a new location. It updates the parent of this folder to the new Id given.
     *
     * @param array{folderId: string}|FolderMoveParams $params
     *
     * @throws APIException
     */
    public function move(
        string $newParentFolderID,
        array|FolderMoveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse {
        [$parsed, $options] = FolderMoveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $folderID = $parsed['folderId'];
        unset($parsed['folderId']);

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
     * @param array{listId: string, newFolderId: string}|FolderMoveListParams $params
     *
     * @throws APIException
     */
    public function moveList(
        array|FolderMoveListParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
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
     * @param array{newFolderName?: string}|FolderRenameParams $params
     *
     * @throws APIException
     */
    public function rename(
        string $folderID,
        array|FolderRenameParams $params,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse {
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
