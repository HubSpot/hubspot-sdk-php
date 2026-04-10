<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Files;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Files\Folder;
use HubSpotSDK\Files\FolderActionResponse;
use HubSpotSDK\Files\Folders\FolderGetByIDParams;
use HubSpotSDK\Files\Folders\FolderGetByPathParams;
use HubSpotSDK\Files\Folders\FolderSearchParams;
use HubSpotSDK\Files\Folders\FolderUpdateAsyncByIDParams;
use HubSpotSDK\Files\Folders\FolderUpdateByIDParams;
use HubSpotSDK\Files\FolderUpdateTaskLocator;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Files\FoldersRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * Delete folder by ID.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByID(
        string $folderID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['files/2026-03/folders/%1$s', $folderID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Delete a folder, identified by its path.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByPath(
        string $folderPath,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['files/2026-03/folders/%1$s', $folderPath],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a folder by its ID.
     *
     * @param array{properties?: list<string>}|FolderGetByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function getByID(
        string $folderID,
        array|FolderGetByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderGetByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['files/2026-03/folders/%1$s', $folderID],
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
     * @param array{properties?: list<string>}|FolderGetByPathParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function getByPath(
        string $folderPath,
        array|FolderGetByPathParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderGetByPathParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['files/2026-03/folders/%1$s', $folderPath],
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FolderActionResponse>
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatus(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['files/2026-03/folders/update/async/tasks/%1$s/status', $taskID],
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
     *   createdAt?: \DateTimeInterface,
     *   createdAtGte?: \DateTimeInterface,
     *   createdAtLte?: \DateTimeInterface,
     *   idGte?: int,
     *   idLte?: int,
     *   ids?: list<int>,
     *   limit?: int,
     *   name?: string,
     *   parentFolderIDs?: list<int>,
     *   path?: string,
     *   properties?: list<string>,
     *   sort?: list<string>,
     *   updatedAt?: \DateTimeInterface,
     *   updatedAtGte?: \DateTimeInterface,
     *   updatedAtLte?: \DateTimeInterface,
     * }|FolderSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<Folder>>
     *
     * @throws APIException
     */
    public function search(
        array|FolderSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderSearchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'files/2026-03/folders/search',
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FolderUpdateTaskLocator>
     *
     * @throws APIException
     */
    public function updateAsyncByID(
        array|FolderUpdateAsyncByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderUpdateAsyncByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'files/2026-03/folders/update/async',
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function updateByID(
        string $folderID,
        array|FolderUpdateByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FolderUpdateByIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['files/2026-03/folders/%1$s', $folderID],
            body: (object) $parsed,
            options: $options,
            convert: Folder::class,
        );
    }
}
