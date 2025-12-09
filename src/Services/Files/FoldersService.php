<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\Folder;
use HubspotSDK\Files\FolderActionResponse;
use HubspotSDK\Files\Folders\FolderCreateParams;
use HubspotSDK\Files\Folders\FolderGetByIDParams;
use HubspotSDK\Files\Folders\FolderGetByPathParams;
use HubspotSDK\Files\Folders\FolderSearchParams;
use HubspotSDK\Files\Folders\FolderUpdateAsyncByIDParams;
use HubspotSDK\Files\Folders\FolderUpdateByIDParams;
use HubspotSDK\Files\FolderUpdateTaskLocator;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Files\FoldersContract;

final class FoldersService implements FoldersContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a folder.
     *
     * @param array{
     *   name: string, parentFolderId?: string, parentPath?: string
     * }|FolderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|FolderCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): Folder {
        [$parsed, $options] = FolderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Folder> */
        $response = $this->client->request(
            method: 'post',
            path: 'files/v3/folders',
            body: (object) $parsed,
            options: $options,
            convert: Folder::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete folder by ID.
     *
     * @throws APIException
     */
    public function deleteByID(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['files/v3/folders/%1$s', $folderID],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a folder, identified by its path.
     *
     * @throws APIException
     */
    public function deleteByPath(
        string $folderPath,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['files/v3/folders/%1$s', $folderPath],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a folder by its ID.
     *
     * @param array{properties?: list<string>}|FolderGetByIDParams $params
     *
     * @throws APIException
     */
    public function getByID(
        string $folderID,
        array|FolderGetByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): Folder {
        [$parsed, $options] = FolderGetByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Folder> */
        $response = $this->client->request(
            method: 'get',
            path: ['files/v3/folders/%1$s', $folderID],
            query: $parsed,
            options: $options,
            convert: Folder::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a folder, identified by its path.
     *
     * @param array{properties?: list<string>}|FolderGetByPathParams $params
     *
     * @throws APIException
     */
    public function getByPath(
        string $folderPath,
        array|FolderGetByPathParams $params,
        ?RequestOptions $requestOptions = null,
    ): Folder {
        [$parsed, $options] = FolderGetByPathParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Folder> */
        $response = $this->client->request(
            method: 'get',
            path: ['files/v3/folders/%1$s', $folderPath],
            query: $parsed,
            options: $options,
            convert: Folder::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Check status of folder update. Folder updates happen asynchronously.
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FolderActionResponse {
        /** @var BaseResponse<FolderActionResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['files/v3/folders/update/async/tasks/%1$s/status', $taskID],
            options: $requestOptions,
            convert: FolderActionResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Search for folders. Does not contain hidden or archived folders.
     *
     * @param array{
     *   after?: string,
     *   before?: string,
     *   createdAt?: string|\DateTimeInterface,
     *   createdAtGte?: string|\DateTimeInterface,
     *   createdAtLte?: string|\DateTimeInterface,
     *   idGte?: int,
     *   idLte?: int,
     *   ids?: list<int>,
     *   limit?: int,
     *   name?: string,
     *   parentFolderIds?: list<int>,
     *   path?: string,
     *   properties?: list<string>,
     *   sort?: list<string>,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedAtGte?: string|\DateTimeInterface,
     *   updatedAtLte?: string|\DateTimeInterface,
     * }|FolderSearchParams $params
     *
     * @return Page<Folder>
     *
     * @throws APIException
     */
    public function search(
        array|FolderSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = FolderSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<Folder>> */
        $response = $this->client->request(
            method: 'get',
            path: 'files/v3/folders/search',
            query: $parsed,
            options: $options,
            convert: Folder::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update properties of folder by given ID. This action happens asynchronously and will update all of the folder's children as well.
     *
     * @param array{
     *   id: string, name?: string, parentFolderId?: int
     * }|FolderUpdateAsyncByIDParams $params
     *
     * @throws APIException
     */
    public function updateAsyncByID(
        array|FolderUpdateAsyncByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): FolderUpdateTaskLocator {
        [$parsed, $options] = FolderUpdateAsyncByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<FolderUpdateTaskLocator> */
        $response = $this->client->request(
            method: 'post',
            path: 'files/v3/folders/update/async',
            body: (object) $parsed,
            options: $options,
            convert: FolderUpdateTaskLocator::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a folder's properties, identified by folder ID.
     *
     * @param array{name?: string, parentFolderId?: int}|FolderUpdateByIDParams $params
     *
     * @throws APIException
     */
    public function updateByID(
        string $folderID,
        array|FolderUpdateByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): Folder {
        [$parsed, $options] = FolderUpdateByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Folder> */
        $response = $this->client->request(
            method: 'patch',
            path: ['files/v3/folders/%1$s', $folderID],
            body: (object) $parsed,
            options: $options,
            convert: Folder::class,
        );

        return $response->parse();
    }
}
