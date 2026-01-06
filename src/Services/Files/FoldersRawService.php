<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
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
use HubspotSDK\ServiceContracts\Files\FoldersRawContract;

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
     * Creates a folder.
     *
     * @param array{
     *   name: string, parentFolderID?: string, parentPath?: string
     * }|FolderCreateParams $params
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function create(
        array|FolderCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = FolderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'files/v3/folders',
            body: (object) $parsed,
            options: $options,
            convert: Folder::class,
        );
    }

    /**
     * @api
     *
     * Delete folder by ID.
     *
     * @param string $folderID ID of folder to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByID(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['files/v3/folders/%1$s', $folderID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete a folder, identified by its path.
     *
     * @param string $folderPath Path of folder to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByPath(
        string $folderPath,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['files/v3/folders/%1$s', $folderPath],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a folder by its ID.
     *
     * @param string $folderID ID of desired folder
     * @param array{properties?: list<string>}|FolderGetByIDParams $params
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function getByID(
        string $folderID,
        array|FolderGetByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderGetByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['files/v3/folders/%1$s', $folderID],
            query: $parsed,
            options: $options,
            convert: Folder::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a folder, identified by its path.
     *
     * @param string $folderPath path of desired folder
     * @param array{properties?: list<string>}|FolderGetByPathParams $params
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function getByPath(
        string $folderPath,
        array|FolderGetByPathParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderGetByPathParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['files/v3/folders/%1$s', $folderPath],
            query: $parsed,
            options: $options,
            convert: Folder::class,
        );
    }

    /**
     * @api
     *
     * Check status of folder update. Folder updates happen asynchronously.
     *
     * @param string $taskID the ID of the folder update task
     *
     * @return BaseResponse<FolderActionResponse>
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['files/v3/folders/update/async/tasks/%1$s/status', $taskID],
            options: $requestOptions,
            convert: FolderActionResponse::class,
        );
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
     *   parentFolderIDs?: list<int>,
     *   path?: string,
     *   properties?: list<string>,
     *   sort?: list<string>,
     *   updatedAt?: string|\DateTimeInterface,
     *   updatedAtGte?: string|\DateTimeInterface,
     *   updatedAtLte?: string|\DateTimeInterface,
     * }|FolderSearchParams $params
     *
     * @return BaseResponse<Page<Folder>>
     *
     * @throws APIException
     */
    public function search(
        array|FolderSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = FolderSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'files/v3/folders/search',
            query: Util::array_transform_keys(
                $parsed,
                ['parentFolderIDs' => 'parentFolderIds']
            ),
            options: $options,
            convert: Folder::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Update properties of folder by given ID. This action happens asynchronously and will update all of the folder's children as well.
     *
     * @param array{
     *   id: string, name?: string, parentFolderID?: int
     * }|FolderUpdateAsyncByIDParams $params
     *
     * @return BaseResponse<FolderUpdateTaskLocator>
     *
     * @throws APIException
     */
    public function updateAsyncByID(
        array|FolderUpdateAsyncByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderUpdateAsyncByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'files/v3/folders/update/async',
            body: (object) $parsed,
            options: $options,
            convert: FolderUpdateTaskLocator::class,
        );
    }

    /**
     * @api
     *
     * Update a folder's properties, identified by folder ID.
     *
     * @param array{name?: string, parentFolderID?: int}|FolderUpdateByIDParams $params
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function updateByID(
        string $folderID,
        array|FolderUpdateByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderUpdateByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['files/v3/folders/%1$s', $folderID],
            body: (object) $parsed,
            options: $options,
            convert: Folder::class,
        );
    }
}
