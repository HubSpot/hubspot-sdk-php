<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\FilesCollectionResponseFolder;
use HubspotSDK\Files\FilesFolder;
use HubspotSDK\Files\FilesFolderActionResponse;
use HubspotSDK\Files\FilesFolderUpdateTaskLocator;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface FoldersContract
{
    /**
     * @api
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
    ): FilesFolder;

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
    ): FilesFolder;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteByID(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteByIDRaw(
        string $folderID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteByPath(
        string $folderPath,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteByPathRaw(
        string $folderPath,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $properties
     *
     * @throws APIException
     */
    public function getByID(
        string $folderID,
        $properties = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesFolder;

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
    ): FilesFolder;

    /**
     * @api
     *
     * @param list<string> $properties
     *
     * @throws APIException
     */
    public function getByPath(
        string $folderPath,
        $properties = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesFolder;

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
        ?RequestOptions $requestOptions = null,
    ): FilesFolder;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FilesFolderActionResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatusRaw(
        string $taskID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolderActionResponse;

    /**
     * @api
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
    ): FilesCollectionResponseFolder;

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
    ): FilesCollectionResponseFolder;

    /**
     * @api
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
    ): FilesFolderUpdateTaskLocator;

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
    ): FilesFolderUpdateTaskLocator;

    /**
     * @api
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
    ): FilesFolder;

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
    ): FilesFolder;
}
