<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Files;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\FileParam;
use HubSpotSDK\Files\File;
use HubSpotSDK\Files\FileActionResponse;
use HubSpotSDK\Files\FileAssets\FileAssetGetSignedURLParams\Size;
use HubSpotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams\DuplicateValidationScope;
use HubSpotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams\DuplicateValidationStrategy;
use HubSpotSDK\Files\FileAssets\FileAssetUpdateParams\Access;
use HubSpotSDK\Files\FileStat;
use HubSpotSDK\Files\Folder;
use HubSpotSDK\Files\ImportFromURLTaskLocator;
use HubSpotSDK\Files\SignedURL;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface FileAssetsContract
{
    /**
     * @api
     *
     * @param string $name desired name for the folder
     * @param string $parentFolderID FolderId of the parent of the created folder. If not specified, the folder will be created at the root level. parentFolderId and parentFolderPath cannot be set at the same time.
     * @param string $parentPath Path of the parent of the created folder. If not specified the folder will be created at the root level. parentFolderPath and parentFolderId cannot be set at the same time.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $parentFolderID = null,
        ?string $parentPath = null,
        RequestOptions|array|null $requestOptions = null,
    ): Folder;

    /**
     * @api
     *
     * @param Access|value-of<Access> $access NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     * @param bool $isUsableInContent mark whether the file should be used in new content or not
     * @param string $name new name for the file
     * @param string $parentFolderID FolderId where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     * @param string $parentFolderPath Folder path where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        bool $clearExpires,
        Access|string|null $access = null,
        ?\DateTimeInterface $expiresAt = null,
        ?bool $isUsableInContent = null,
        ?string $name = null,
        ?string $parentFolderID = null,
        ?string $parentFolderPath = null,
        RequestOptions|array|null $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $fileID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $fileID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $properties
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        ?array $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param list<string> $properties
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByPath(
        string $path,
        ?array $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): FileStat;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getImportTaskStatus(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): FileActionResponse;

    /**
     * @api
     *
     * @param Size|value-of<Size> $size
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        ?int $expirationSeconds = null,
        Size|string|null $size = null,
        ?bool $upscale = null,
        RequestOptions|array|null $requestOptions = null,
    ): SignedURL;

    /**
     * @api
     *
     * @param \HubSpotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams\Access|value-of<\HubSpotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams\Access> $access PUBLIC_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines can index the file. PUBLIC_NOT_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines *can't* index the file. PRIVATE: File is NOT publicly accessible. Requires a signed URL to see content. Search engines *can't* index the file.
     * @param DuplicateValidationScope|value-of<DuplicateValidationScope> $duplicateValidationScope ENTIRE_PORTAL: Look for a duplicate file in the entire account. EXACT_FOLDER: Look for a duplicate file in the provided folder.
     * @param DuplicateValidationStrategy|value-of<DuplicateValidationStrategy> $duplicateValidationStrategy NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     * @param bool $overwrite If true, will overwrite existing file if one with the same name and extension exists in the given folder. The overwritten file will be deleted and the uploaded file will take its place with a new ID. If unset or set as false, the new file's name will be updated to prevent colliding with existing file if one exists with the same path, name, and extension
     * @param \DateTimeInterface $expiresAt specifies the date and time when the file will expire
     * @param string $folderID One of folderId or folderPath is required. Destination folderId for the uploaded file.
     * @param string $folderPath One of folderPath or folderId is required. Destination folder path for the uploaded file. If the folder path does not exist, there will be an attempt to create the folder path.
     * @param string $name name to give the resulting file in the file manager
     * @param string $ttl Time to live. If specified the file will be deleted after the given time frame. If left unset, the file will exist indefinitely
     * @param string $url URL to download the new file from
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        \HubSpotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams\Access|string $access,
        DuplicateValidationScope|string $duplicateValidationScope,
        DuplicateValidationStrategy|string $duplicateValidationStrategy,
        bool $overwrite,
        ?\DateTimeInterface $expiresAt = null,
        ?string $folderID = null,
        ?string $folderPath = null,
        ?string $name = null,
        ?string $ttl = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): ImportFromURLTaskLocator;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        ?string $charsetHunch = null,
        string|FileParam|null $file = null,
        ?string $options = null,
        RequestOptions|array|null $requestOptions = null,
    ): File;

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
     * @return Page<File>
     *
     * @throws APIException
     */
    public function search(
        ?string $after = null,
        ?bool $allowsAnonymousAccess = null,
        ?string $before = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $createdAtGte = null,
        ?\DateTimeInterface $createdAtLte = null,
        ?string $encoding = null,
        ?\DateTimeInterface $expiresAt = null,
        ?\DateTimeInterface $expiresAtGte = null,
        ?\DateTimeInterface $expiresAtLte = null,
        ?string $extension = null,
        ?string $fileMd5 = null,
        ?int $height = null,
        ?int $heightGte = null,
        ?int $heightLte = null,
        ?int $idGte = null,
        ?int $idLte = null,
        ?array $ids = null,
        ?bool $isUsableInContent = null,
        ?int $limit = null,
        ?string $name = null,
        ?array $parentFolderIDs = null,
        ?string $path = null,
        ?array $properties = null,
        ?int $size = null,
        ?int $sizeGte = null,
        ?int $sizeLte = null,
        ?array $sort = null,
        ?string $type = null,
        ?\DateTimeInterface $updatedAt = null,
        ?\DateTimeInterface $updatedAtGte = null,
        ?\DateTimeInterface $updatedAtLte = null,
        ?string $url = null,
        ?int $width = null,
        ?int $widthGte = null,
        ?int $widthLte = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        ?string $charsetHunch = null,
        string|FileParam|null $file = null,
        ?string $fileName = null,
        ?string $folderID = null,
        ?string $folderPath = null,
        ?string $options = null,
        RequestOptions|array|null $requestOptions = null,
    ): File;
}
