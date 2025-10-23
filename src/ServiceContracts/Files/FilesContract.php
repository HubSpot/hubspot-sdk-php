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
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Files\SignedURL;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface FilesContract
{
    /**
     * @api
     *
     * @param Access|value-of<Access> $access NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     * @param bool $clearExpires
     * @param \DateTimeInterface $expiresAt
     * @param bool $isUsableInContent mark whether the file should be used in new content or not
     * @param string $name new name for the file
     * @param string $parentFolderID FolderId where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     * @param string $parentFolderPath Folder path where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        $access = omit,
        $clearExpires = omit,
        $expiresAt = omit,
        $isUsableInContent = omit,
        $name = omit,
        $parentFolderID = omit,
        $parentFolderPath = omit,
        ?RequestOptions $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $fileID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): File;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<string> $properties
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        $properties = omit,
        ?RequestOptions $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $fileID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): File;

    /**
     * @api
     *
     * @param list<string> $properties properties to return in the response
     *
     * @throws APIException
     */
    public function getByPath(
        string $path,
        $properties = omit,
        ?RequestOptions $requestOptions = null
    ): FileStat;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByPathRaw(
        string $path,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FileStat;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getImportTaskStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FileActionResponse;

    /**
     * @api
     *
     * @param int $expirationSeconds how long in seconds the link will provide access to the file
     * @param Size|value-of<Size> $size For image files. This will resize the image to the desired size before sharing. Does not affect the original file, just the file served by this signed URL.
     * @param bool $upscale if size is provided, this will upscale the image to fit the size dimensions
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        $expirationSeconds = omit,
        $size = omit,
        $upscale = omit,
        ?RequestOptions $requestOptions = null,
    ): SignedURL;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getSignedURLRaw(
        string $fileID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): SignedURL;

    /**
     * @api
     *
     * @param \HubspotSDK\Files\Files\FileImportFromURLAsyncParams\Access|value-of<\HubspotSDK\Files\Files\FileImportFromURLAsyncParams\Access> $access PUBLIC_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines can index the file. PUBLIC_NOT_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines *can't* index the file. PRIVATE: File is NOT publicly accessible. Requires a signed URL to see content. Search engines *can't* index the file.
     * @param string $url URL to download the new file from
     * @param DuplicateValidationScope|value-of<DuplicateValidationScope> $duplicateValidationScope ENTIRE_PORTAL: Look for a duplicate file in the entire account. EXACT_FOLDER: Look for a duplicate file in the provided folder.
     * @param DuplicateValidationStrategy|value-of<DuplicateValidationStrategy> $duplicateValidationStrategy NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     * @param \DateTimeInterface $expiresAt specifies the date and time when the file will expire
     * @param string $folderID One of folderId or folderPath is required. Destination folderId for the uploaded file.
     * @param string $folderPath One of folderPath or folderId is required. Destination folder path for the uploaded file. If the folder path does not exist, there will be an attempt to create the folder path.
     * @param string $name name to give the resulting file in the file manager
     * @param bool $overwrite If true, will overwrite existing file if one with the same name and extension exists in the given folder. The overwritten file will be deleted and the uploaded file will take its place with a new ID. If unset or set as false, the new file's name will be updated to prevent colliding with existing file if one exists with the same path, name, and extension
     * @param string $ttl Time to live. If specified the file will be deleted after the given time frame. If left unset, the file will exist indefinitely
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        $access,
        $url,
        $duplicateValidationScope = omit,
        $duplicateValidationStrategy = omit,
        $expiresAt = omit,
        $folderID = omit,
        $folderPath = omit,
        $name = omit,
        $overwrite = omit,
        $ttl = omit,
        ?RequestOptions $requestOptions = null,
    ): ImportFromURLTaskLocator;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function importFromURLAsyncRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ImportFromURLTaskLocator;

    /**
     * @api
     *
     * @param string $charsetHunch character set of given file data
     * @param string $file file data that will replace existing file in the file manager
     * @param string $options JSON string representing FileReplaceOptions. Includes options to set the access and expiresAt properties, which will automatically update when the file is replaced.
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        $charsetHunch = omit,
        $file = omit,
        $options = omit,
        ?RequestOptions $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $fileID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): File;

    /**
     * @api
     *
     * @param string $after Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000. Narrow your search down if you are reaching this limit.
     * @param bool $allowsAnonymousAccess Search files by access. If `true`, will show only public files. If `false`, will show only private files.
     * @param string $before
     * @param \DateTimeInterface $createdAt search files by time of creation
     * @param \DateTimeInterface $createdAtGte Search files by greater than or equal to time of creation. Can be used with `createdAtLte` to create a range.
     * @param \DateTimeInterface $createdAtLte Search files by less than or equal to time of creation. Can be used with `createdAtGte` to create a range.
     * @param string $encoding search files by specified encoding
     * @param \DateTimeInterface $expiresAt Search files by exact expires time. Time must be epoch time in milliseconds.
     * @param \DateTimeInterface $expiresAtGte Search files by greater than or equal to expires time. Can be used with `expiresAtLte` to create a range.
     * @param \DateTimeInterface $expiresAtLte Search files by less than or equal to expires time. Can be used with `expiresAtGte` to create a range.
     * @param string $extension search files by given extension
     * @param string $fileMd5 search files by a specific md5 hash
     * @param int $height search files by height of image or video
     * @param int $heightGte Search files by greater than or equal to height of image or video. Can be used with `heightLte` to create a range.
     * @param int $heightLte Search files by less than or equal to height of image or video. Can be used with `heightGte` to create a range.
     * @param int $idGte
     * @param int $idLte
     * @param list<int> $ids search by a list of file IDs
     * @param bool $isUsableInContent If `true`, shows files that have been marked to be used in new content. If `false`, shows files that should not be used in new content.
     * @param int $limit Number of items to return. Default limit is 10, maximum limit is 100.
     * @param string $name search for files containing the given name
     * @param list<int> $parentFolderIDs search files within given `folderId`
     * @param string $path search files by path
     * @param list<string> $properties a list of file properties to return
     * @param int $size search files by exact file size in bytes
     * @param int $sizeGte Search files by greater than or equal to file size. Can be used with `sizeLte` to create a range.
     * @param int $sizeLte Search files by less than or equal to file size. Can be used with `sizeGte` to create a range.
     * @param list<string> $sort sort files by a given field
     * @param string $type filter by provided file type
     * @param \DateTimeInterface $updatedAt search files by time of latest updated
     * @param \DateTimeInterface $updatedAtGte Search files by greater than or equal to time of latest update. Can be used with `updatedAtLte` to create a range.
     * @param \DateTimeInterface $updatedAtLte Search files by less than or equal to time of latest update. Can be used with `updatedAtGte` to create a range.
     * @param string $url search by file URL
     * @param int $width search files by width of image or video
     * @param int $widthGte Search files by greater than or equal to width of image or video. Can be used with `widthLte` to create a range.
     * @param int $widthLte Search files by less than or equal to width of image or video. Can be used with `widthGte` to create a range.
     *
     * @return Page<File>
     *
     * @throws APIException
     */
    public function search(
        $after = omit,
        $allowsAnonymousAccess = omit,
        $before = omit,
        $createdAt = omit,
        $createdAtGte = omit,
        $createdAtLte = omit,
        $encoding = omit,
        $expiresAt = omit,
        $expiresAtGte = omit,
        $expiresAtLte = omit,
        $extension = omit,
        $fileMd5 = omit,
        $height = omit,
        $heightGte = omit,
        $heightLte = omit,
        $idGte = omit,
        $idLte = omit,
        $ids = omit,
        $isUsableInContent = omit,
        $limit = omit,
        $name = omit,
        $parentFolderIDs = omit,
        $path = omit,
        $properties = omit,
        $size = omit,
        $sizeGte = omit,
        $sizeLte = omit,
        $sort = omit,
        $type = omit,
        $updatedAt = omit,
        $updatedAtGte = omit,
        $updatedAtLte = omit,
        $url = omit,
        $width = omit,
        $widthGte = omit,
        $widthLte = omit,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<File>
     *
     * @throws APIException
     */
    public function searchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param string $charsetHunch character set of the uploaded file
     * @param string $file file to be uploaded
     * @param string $fileName desired name for the uploaded file
     * @param string $folderID Either 'folderId' or 'folderPath' is required. folderId is the ID of the folder the file will be uploaded to.
     * @param string $folderPath Either 'folderPath' or 'folderId' is required. This field represents the destination folder path for the uploaded file. If a path doesn't exist, the system will try to create one.
     * @param string $options JSON string representing FileUploadOptions
     *
     * @throws APIException
     */
    public function upload(
        $charsetHunch = omit,
        $file = omit,
        $fileName = omit,
        $folderID = omit,
        $folderPath = omit,
        $options = omit,
        ?RequestOptions $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function uploadRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): File;
}
