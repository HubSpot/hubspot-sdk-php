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

use const HubspotSDK\Core\OMIT as omit;

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
     * @param string $name the name of the folder to be created
     * @param string $parentFolderID the folder this should be created in, if not specified will be created in the root folder 0
     *
     * @throws APIException
     */
    public function create(
        $name,
        $parentFolderID = omit,
        ?RequestOptions $requestOptions = null
    ): ListFolderCreateResponse {
        $params = ['name' => $name, 'parentFolderID' => $parentFolderID];

        return $this->createRaw($params, $requestOptions);
    }

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
    ): ListFolderCreateResponse {
        [$parsed, $options] = FolderCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
        // @phpstan-ignore-next-line;
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
     * @param string $folderID the Id of the folder to retrieve
     *
     * @throws APIException
     */
    public function get(
        $folderID = omit,
        ?RequestOptions $requestOptions = null
    ): ListFolderFetchResponse {
        $params = ['folderID' => $folderID];

        return $this->getRaw($params, $requestOptions);
    }

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
    ): ListFolderFetchResponse {
        [$parsed, $options] = FolderGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $folderID
     *
     * @throws APIException
     */
    public function move(
        string $newParentFolderID,
        $folderID,
        ?RequestOptions $requestOptions = null
    ): ListFolderFetchResponse {
        $params = ['folderID' => $folderID];

        return $this->moveRaw($newParentFolderID, $params, $requestOptions);
    }

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
    ): ListFolderFetchResponse {
        [$parsed, $options] = FolderMoveParams::parseRequest(
            $params,
            $requestOptions
        );
        $folderID = $parsed['folderID'];
        unset($parsed['folderID']);

        // @phpstan-ignore-next-line;
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
     * @param string $listID the Id of the list to move
     * @param string $newFolderID the Id of folder to move the list to, the root folder is Id 0
     *
     * @throws APIException
     */
    public function moveList(
        $listID,
        $newFolderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['listID' => $listID, 'newFolderID' => $newFolderID];

        return $this->moveListRaw($params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = FolderMoveListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param string $newFolderName the new name of the folder
     *
     * @throws APIException
     */
    public function rename(
        string $folderID,
        $newFolderName = omit,
        ?RequestOptions $requestOptions = null,
    ): ListFolderFetchResponse {
        $params = ['newFolderName' => $newFolderName];

        return $this->renameRaw($folderID, $params, $requestOptions);
    }

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
    ): ListFolderFetchResponse {
        [$parsed, $options] = FolderRenameParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['crm/v3/lists/folders/%1$s/rename', $folderID],
            query: $parsed,
            options: $options,
            convert: ListFolderFetchResponse::class,
        );
    }
}
