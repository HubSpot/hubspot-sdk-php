<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\FilesCollectionResponseFolder;
use HubspotSDK\Files\FilesFolder;
use HubspotSDK\Files\FilesFolderActionResponse;
use HubspotSDK\Files\FilesFolderUpdateTaskLocator;
use HubspotSDK\Files\Folders\FolderCreateParams;
use HubspotSDK\Files\Folders\FolderGetByIDParams;
use HubspotSDK\Files\Folders\FolderGetByPathParams;
use HubspotSDK\Files\Folders\FolderSearchParams;
use HubspotSDK\Files\Folders\FolderUpdateAsyncParams;
use HubspotSDK\Files\Folders\FolderUpdateByIDParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Files\FoldersContract;

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
     * Create folder
     *
     * @param string $name
     * @param string $parentFolderID
     * @param string $parentPath
     *
     * @throws APIException
     */
    public function create(
        $name,
        $parentFolderID = omit,
        $parentPath = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesFolder {
        $params = [
            'name' => $name,
            'parentFolderID' => $parentFolderID,
            'parentPath' => $parentPath,
        ];

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
    ): FilesFolder {
        [$parsed, $options] = FolderCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'files/v3/folders',
            body: (object) $parsed,
            options: $options,
            convert: FilesFolder::class,
        );
    }

    /**
     * @api
     *
     * Delete folder by ID
     *
     * @throws APIException
     */
    public function deleteByID(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteByIDRaw($folderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteByIDRaw(
        string $folderID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
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
     * Delete folder by path
     *
     * @throws APIException
     */
    public function deleteByPath(
        string $folderPath,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteByPathRaw($folderPath, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteByPathRaw(
        string $folderPath,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
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
     * Retrieve folder by ID
     *
     * @param list<string> $properties
     *
     * @throws APIException
     */
    public function getByID(
        string $folderID,
        $properties = omit,
        ?RequestOptions $requestOptions = null
    ): FilesFolder {
        $params = ['properties' => $properties];

        return $this->getByIDRaw($folderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByIDRaw(
        string $folderID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolder {
        [$parsed, $options] = FolderGetByIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/folders/%1$s', $folderID],
            query: $parsed,
            options: $options,
            convert: FilesFolder::class,
        );
    }

    /**
     * @api
     *
     * Retrieve folder by path
     *
     * @param list<string> $properties
     *
     * @throws APIException
     */
    public function getByPath(
        string $folderPath,
        $properties = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesFolder {
        $params = ['properties' => $properties];

        return $this->getByPathRaw($folderPath, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByPathRaw(
        string $folderPath,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolder {
        [$parsed, $options] = FolderGetByPathParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/folders/%1$s', $folderPath],
            query: $parsed,
            options: $options,
            convert: FilesFolder::class,
        );
    }

    /**
     * @api
     *
     * Check folder update status
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FilesFolderActionResponse {
        $params = [];

        return $this->getUpdateAsyncStatusRaw($taskID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatusRaw(
        string $taskID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolderActionResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/folders/update/async/tasks/%1$s/status', $taskID],
            options: $requestOptions,
            convert: FilesFolderActionResponse::class,
        );
    }

    /**
     * @api
     *
     * Search folders
     *
     * @param string $after
     * @param string $before
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdAtGte
     * @param \DateTimeInterface $createdAtLte
     * @param int $idGte
     * @param int $idLte
     * @param list<int> $ids
     * @param int $limit
     * @param string $name
     * @param list<int> $parentFolderIDs
     * @param string $path
     * @param list<string> $properties
     * @param list<string> $sort
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedAtGte
     * @param \DateTimeInterface $updatedAtLte
     *
     * @throws APIException
     */
    public function search(
        $after = omit,
        $before = omit,
        $createdAt = omit,
        $createdAtGte = omit,
        $createdAtLte = omit,
        $idGte = omit,
        $idLte = omit,
        $ids = omit,
        $limit = omit,
        $name = omit,
        $parentFolderIDs = omit,
        $path = omit,
        $properties = omit,
        $sort = omit,
        $updatedAt = omit,
        $updatedAtGte = omit,
        $updatedAtLte = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesCollectionResponseFolder {
        $params = [
            'after' => $after,
            'before' => $before,
            'createdAt' => $createdAt,
            'createdAtGte' => $createdAtGte,
            'createdAtLte' => $createdAtLte,
            'idGte' => $idGte,
            'idLte' => $idLte,
            'ids' => $ids,
            'limit' => $limit,
            'name' => $name,
            'parentFolderIDs' => $parentFolderIDs,
            'path' => $path,
            'properties' => $properties,
            'sort' => $sort,
            'updatedAt' => $updatedAt,
            'updatedAtGte' => $updatedAtGte,
            'updatedAtLte' => $updatedAtLte,
        ];

        return $this->searchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function searchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesCollectionResponseFolder {
        [$parsed, $options] = FolderSearchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'files/v3/folders/search',
            query: $parsed,
            options: $options,
            convert: FilesCollectionResponseFolder::class,
        );
    }

    /**
     * @api
     *
     * Update folder properties
     *
     * @param string $id
     * @param string $name
     * @param int $parentFolderID
     *
     * @throws APIException
     */
    public function updateAsync(
        $id,
        $name = omit,
        $parentFolderID = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesFolderUpdateTaskLocator {
        $params = [
            'id' => $id, 'name' => $name, 'parentFolderID' => $parentFolderID,
        ];

        return $this->updateAsyncRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateAsyncRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolderUpdateTaskLocator {
        [$parsed, $options] = FolderUpdateAsyncParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'files/v3/folders/update/async',
            body: (object) $parsed,
            options: $options,
            convert: FilesFolderUpdateTaskLocator::class,
        );
    }

    /**
     * @api
     *
     * Update folder properties by folder ID
     *
     * @param string $name
     * @param int $parentFolderID
     *
     * @throws APIException
     */
    public function updateByID(
        string $folderID,
        $name = omit,
        $parentFolderID = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesFolder {
        $params = ['name' => $name, 'parentFolderID' => $parentFolderID];

        return $this->updateByIDRaw($folderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateByIDRaw(
        string $folderID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolder {
        [$parsed, $options] = FolderUpdateByIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['files/v3/folders/%1$s', $folderID],
            body: (object) $parsed,
            options: $options,
            convert: FilesFolder::class,
        );
    }
}
