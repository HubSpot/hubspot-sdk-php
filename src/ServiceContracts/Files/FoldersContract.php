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
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param list<int> $ids
     * @param int $limit the maximum number of results to display per page
     * @param list<int> $parentFolderIDs
     * @param list<string> $properties
     * @param list<string> $sort
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
     * @param string $name the new name for the folder, which will also update the fullPath and all children of the folder
     * @param int $parentFolderID the ID of the new parent folder, which will move the folder and its children into the specified folder
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
