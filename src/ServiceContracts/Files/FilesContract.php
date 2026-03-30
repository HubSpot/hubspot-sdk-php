<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\Files\FileGetSignedURLParams\Size;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationScope;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationStrategy;
use HubspotSDK\Files\Files\FileUpdateParams\Access;
use HubspotSDK\Files\FileStat;
use HubspotSDK\Files\Folder;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Files\SignedURL;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface FilesContract
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
     * @param string $fileID ID of file to update
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
     * @param string $fileID FileId to delete
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
     * @param string $fileID ID of file to GDPR delete
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
     * @param string $fileID ID of the desired file
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
     * @param string $taskID Import by URL task ID
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
     * @param string $fileID ID of file
     * @param int $expirationSeconds how long in seconds the link will provide access to the file
     * @param Size|value-of<Size> $size For image files. This will resize the image to the desired size before sharing. Does not affect the original file, just the file served by this signed URL.
     * @param bool $upscale if size is provided, this will upscale the image to fit the size dimensions
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
     * @param \HubspotSDK\Files\Files\FileImportFromURLAsyncParams\Access|value-of<\HubspotSDK\Files\Files\FileImportFromURLAsyncParams\Access> $access PUBLIC_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines can index the file. PUBLIC_NOT_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines *can't* index the file. PRIVATE: File is NOT publicly accessible. Requires a signed URL to see content. Search engines *can't* index the file.
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
        \HubspotSDK\Files\Files\FileImportFromURLAsyncParams\Access|string $access,
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
     * @param string $fileID ID of the desired file
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        ?string $charsetHunch = null,
        ?string $file = null,
        ?string $options = null,
        RequestOptions|array|null $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param string $after Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000.  Narrow your search down if you are reaching this limit.
     * @param bool $allowsAnonymousAccess Search files by access. If 'true' will show only public files; if 'false' will show only private files
     * @param string $before Search files updated before this timestamp. Time must be epoch time in milliseconds.
     * @param \DateTimeInterface $createdAt Search files by exact time of creation. Time must be epoch time in milliseconds.
     * @param \DateTimeInterface $createdAtGte Search files by greater than or equal to time of creation. Can be used with createdAtLte to create a range.
     * @param \DateTimeInterface $createdAtLte Search files by less than or equal to time of creation. Can be used with createdAtGte to create a range.
     * @param string $encoding search files by specified encoding
     * @param \DateTimeInterface $expiresAt Search files by exact expires time. Time must be epoch time in milliseconds.
     * @param \DateTimeInterface $expiresAtGte Search files by greater than or equal to expires time. Can be used with expiresAtLte to create a range.
     * @param \DateTimeInterface $expiresAtLte Search files by less than or equal to expires time. Can be used with expiresAtGte to create a range.
     * @param string $extension search files by given extension
     * @param string $fileMd5 search files by specific md5 hash
     * @param int $height search files by height of image or video
     * @param int $heightGte Search files by greater than or equal to height of image or video. Can be used with heightLte to create a range.
     * @param int $heightLte Search files by less than or equal to height of image or video. Can be used with heightGte to create a range.
     * @param int $idGte Search files by greater than or equal to ID. Can be used with idLte to create a range.
     * @param int $idLte Search files by less than or equal to ID. Can be used with idGte to create a range.
     * @param list<int> $ids
     * @param bool $isUsableInContent If true shows files that have been marked to be used in new content. It false shows files that should not be used in new content.
     * @param int $limit Number of items to return. Default limit is 10, maximum limit is 100.
     * @param string $name search for files containing the given name
     * @param list<int> $parentFolderIDs
     * @param string $path search files by path
     * @param list<string> $properties desired file properties in the return object
     * @param int $size search files by exact file size in bytes
     * @param int $sizeGte Search files by greater than or equal to file size. Can be used with sizeLte to create a range.
     * @param int $sizeLte Search files by less than or equal to file size. Can be used with sizeGte to create a range.
     * @param list<string> $sort sort files by a given field
     * @param string $type search files by file type
     * @param \DateTimeInterface $updatedAt Search files by exact time of latest updated. Time must be epoch time in milliseconds.
     * @param \DateTimeInterface $updatedAtGte Search files by greater than or equal to time of latest update. Can be used with updatedAtLte to create a range.
     * @param \DateTimeInterface $updatedAtLte Search files by less than or equal to time of latest update. Can be used with updatedAtGte to create a range.
     * @param string $url Search for given URL
     * @param int $width search files by width of image or video
     * @param int $widthGte Search files by greater than or equal to width of image or video. Can be used with widthLte to create a range.
     * @param int $widthLte Search files by less than or equal to width of image or video. Can be used with widthGte to create a range.
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
        ?string $file = null,
        ?string $fileName = null,
        ?string $folderID = null,
        ?string $folderPath = null,
        ?string $options = null,
        RequestOptions|array|null $requestOptions = null,
    ): File;
}
