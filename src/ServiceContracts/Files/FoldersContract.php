<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\Folder;
use HubspotSDK\Files\FolderActionResponse;
use HubspotSDK\Files\FolderUpdateTaskLocator;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface FoldersContract
{
    /**
     * @api
     *
     * @param string $folderID ID of folder to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteByID(
        string $folderID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $folderPath Path of folder to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteByPath(
        string $folderPath,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $folderID ID of desired folder
     * @param list<string> $properties properties to set on returned folder
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByID(
        string $folderID,
        ?array $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): Folder;

    /**
     * @api
     *
     * @param string $folderPath path of desired folder
     * @param list<string> $properties properties to set on returned folder
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByPath(
        string $folderPath,
        ?array $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): Folder;

    /**
     * @api
     *
     * @param string $taskID TaskId of folder update
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getUpdateAsyncStatus(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): FolderActionResponse;

    /**
     * @api
     *
     * @param string $after Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000.  Narrow your search down if you are reaching this limit.
     * @param string $before Search folders updated before this timestamp. Time must be epoch time in milliseconds.
     * @param \DateTimeInterface $createdAt Search folders by exact time of creation. Time must be epoch time in milliseconds.
     * @param \DateTimeInterface $createdAtGte Search folders by greater than or equal to time of creation. Can be used with createdAtLte to create a range.
     * @param \DateTimeInterface $createdAtLte Search folders by less than or equal to time of creation. Can be used with createdAtGte to create a range.
     * @param int $idGte Search folders by greater than or equal to ID. Can be used with idLte to create a range.
     * @param int $idLte Search folders by less than or equal to ID. Can be used with idGte to create a range.
     * @param list<int> $ids Search folders by multiple IDs. Comma-separated list of folder IDs.
     * @param int $limit Number of items to return. Default limit is 10, maximum limit is 100.
     * @param string $name search for folders containing the specified name
     * @param list<int> $parentFolderIDs
     * @param string $path search folders by path
     * @param list<string> $properties properties that should be included in the returned folders
     * @param list<string> $sort Sort results by given property. For example -name sorts by name field descending, name sorts by name field ascending.
     * @param \DateTimeInterface $updatedAt Search folders by exact time of latest updated. Time must be epoch time in milliseconds.
     * @param \DateTimeInterface $updatedAtGte Search folders by greater than or equal to time of latest update. Can be used with updatedAtLte to create a range.
     * @param \DateTimeInterface $updatedAtLte Search folders by less than or equal to time of latest update. Can be used with updatedAtGte to create a range.
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<Folder>
     *
     * @throws APIException
     */
    public function search(
        ?string $after = null,
        ?string $before = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdAtGte = null,
        ?\DateTimeInterface $createdAtLte = null,
        ?int $idGte = null,
        ?int $idLte = null,
        ?array $ids = null,
        ?int $limit = null,
        ?string $name = null,
        ?array $parentFolderIDs = null,
        ?string $path = null,
        ?array $properties = null,
        ?array $sort = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedAtGte = null,
        ?\DateTimeInterface $updatedAtLte = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $id the unique identifier of the folder to be updated
     * @param string $name New name. If specified the folder's name and fullPath will change. All children of the folder will be updated accordingly.
     * @param int $parentFolderID New parent folderId. If changed, the folder and all it's children will be moved into the specified folder. parentFolderId and parentFolderPath cannot be specified at the same time.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateAsyncByID(
        string $id,
        ?string $name = null,
        ?int $parentFolderID = null,
        RequestOptions|array|null $requestOptions = null,
    ): FolderUpdateTaskLocator;

    /**
     * @api
     *
     * @param string $folderID ID of folder to update
     * @param string $name New name. If specified the folder's name and fullPath will change. All children of the folder will be updated accordingly.
     * @param int $parentFolderID New parent folderId. If changed, the folder and all it's children will be moved into the specified folder. parentFolderId and parentFolderPath cannot be specified at the same time.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateByID(
        string $folderID,
        ?string $name = null,
        ?int $parentFolderID = null,
        RequestOptions|array|null $requestOptions = null,
    ): Folder;
}
