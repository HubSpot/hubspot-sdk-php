<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\CollectionResponseFolder;
use HubspotSDK\Files\Folder;
use HubspotSDK\Files\FolderActionResponse;
use HubspotSDK\Files\FolderUpdateTaskLocator;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface FoldersContract
{
    /**
     * @api
     *
     * @param string $name desired name for the folder
     * @param string $parentFolderID FolderId of the parent of the created folder. If not specified, the folder will be created at the root level. parentFolderId and parentFolderPath cannot be set at the same time.
     * @param string $parentPath Path of the parent of the created folder. If not specified the folder will be created at the root level. parentFolderPath and parentFolderId cannot be set at the same time.
     *
     * @throws APIException
     */
    public function create(
        $name,
        $parentFolderID = omit,
        $parentPath = omit,
        ?RequestOptions $requestOptions = null,
    ): Folder;

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
    ): Folder;

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
    public function deleteByPath(
        string $folderPath,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $properties properties to set on returned folder
     *
     * @throws APIException
     */
    public function getByID(
        string $folderID,
        $properties = omit,
        ?RequestOptions $requestOptions = null,
    ): Folder;

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
    ): Folder;

    /**
     * @api
     *
     * @param list<string> $properties properties to set on returned folder
     *
     * @throws APIException
     */
    public function getByPath(
        string $folderPath,
        $properties = omit,
        ?RequestOptions $requestOptions = null,
    ): Folder;

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
    ): Folder;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FolderActionResponse;

    /**
     * @api
     *
     * @param string $after Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000. Narrow your search down if you are reaching this limit.
     * @param string $before
     * @param \DateTimeInterface $createdAt Search folders by exact time of creation. Time must be epoch time in milliseconds.
     * @param \DateTimeInterface $createdAtGte Search folders by greater than or equal to time of creation. Can be used with createdAtLte to create a range.
     * @param \DateTimeInterface $createdAtLte Search folders by less than or equal to time of creation. Can be used with createdAtGte to create a range.
     * @param int $idGte
     * @param int $idLte
     * @param list<int> $ids
     * @param int $limit Number of items to return. Default limit is 10, maximum limit is 100.
     * @param string $name search for folders containing the specified name
     * @param list<int> $parentFolderIDs search folders with the given parent folderId
     * @param string $path search folders by path
     * @param list<string> $properties properties that should be included in the returned folders
     * @param list<string> $sort Sort results by given property. For example -name sorts by name field descending, name sorts by name field ascending.
     * @param \DateTimeInterface $updatedAt Search folders by exact time of latest updated. Time must be epoch time in milliseconds.
     * @param \DateTimeInterface $updatedAtGte Search folders by greater than or equal to time of latest update. Can be used with updatedAtLte to create a range.
     * @param \DateTimeInterface $updatedAtLte Search folders by less than or equal to time of latest update. Can be used with updatedAtGte to create a range.
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
    ): CollectionResponseFolder;

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
    ): CollectionResponseFolder;

    /**
     * @api
     *
     * @param string $id the unique identifier of the folder to be updated
     * @param string $name the new name for the folder, which will also update the fullPath and all children of the folder
     * @param int $parentFolderID the ID of the new parent folder, which will move the folder and its children into the specified folder
     *
     * @throws APIException
     */
    public function updateAsync(
        $id,
        $name = omit,
        $parentFolderID = omit,
        ?RequestOptions $requestOptions = null,
    ): FolderUpdateTaskLocator;

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
    ): FolderUpdateTaskLocator;

    /**
     * @api
     *
     * @param string $name New name. If specified the folder's name and fullPath will change. All children of the folder will be updated accordingly.
     * @param int $parentFolderID New parent folderId. If changed, the folder and all it's children will be moved into the specified folder. parentFolderId and parentFolderPath cannot be specified at the same time.
     *
     * @throws APIException
     */
    public function updateByID(
        string $folderID,
        $name = omit,
        $parentFolderID = omit,
        ?RequestOptions $requestOptions = null,
    ): Folder;

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
    ): Folder;
}
