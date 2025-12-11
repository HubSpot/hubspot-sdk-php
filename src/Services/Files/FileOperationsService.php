<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\FileOperations\FileOperationGetSignedURLParams\Size;
use HubspotSDK\Files\FileOperations\FileOperationImportFromURLAsyncParams\DuplicateValidationScope;
use HubspotSDK\Files\FileOperations\FileOperationImportFromURLAsyncParams\DuplicateValidationStrategy;
use HubspotSDK\Files\FileOperations\FileOperationUpdateParams\Access;
use HubspotSDK\Files\FileStat;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Files\SignedURL;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Files\FileOperationsContract;

final class FileOperationsService implements FileOperationsContract
{
    /**
     * @api
     */
    public FileOperationsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FileOperationsRawService($client);
    }

    /**
     * @api
     *
     * Update properties of file by ID.
     *
     * @param string $fileID ID of file to update
     * @param 'HIDDEN_INDEXABLE'|'HIDDEN_NOT_INDEXABLE'|'HIDDEN_PRIVATE'|'HIDDEN_SENSITIVE'|'PRIVATE'|'PUBLIC_INDEXABLE'|'PUBLIC_NOT_INDEXABLE'|'SENSITIVE'|Access $access NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     * @param bool $isUsableInContent mark whether the file should be used in new content or not
     * @param string $name new name for the file
     * @param string $parentFolderID FolderId where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     * @param string $parentFolderPath Folder path where the file should be moved to. folderId and folderPath parameters cannot be set at the same time.
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        string|Access|null $access = null,
        ?bool $clearExpires = null,
        string|\DateTimeInterface|null $expiresAt = null,
        ?bool $isUsableInContent = null,
        ?string $name = null,
        ?string $parentFolderID = null,
        ?string $parentFolderPath = null,
        ?RequestOptions $requestOptions = null,
    ): File {
        $params = Util::removeNulls(
            [
                'access' => $access,
                'clearExpires' => $clearExpires,
                'expiresAt' => $expiresAt,
                'isUsableInContent' => $isUsableInContent,
                'name' => $name,
                'parentFolderID' => $parentFolderID,
                'parentFolderPath' => $parentFolderPath,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($fileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a file by ID
     *
     * @param string $fileID FileId to delete
     *
     * @throws APIException
     */
    public function delete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($fileID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a file in accordance with GDPR regulations.
     *
     * @param string $fileID ID of file to GDPR delete
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->gdprDelete($fileID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a file by its ID.
     *
     * @param string $fileID ID of the desired file
     * @param list<string> $properties
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        ?array $properties = null,
        ?RequestOptions $requestOptions = null,
    ): File {
        $params = Util::removeNulls(['properties' => $properties]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($fileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a file by its path.
     *
     * @param string $filePath the path of the file
     * @param list<string> $properties properties to return in the response
     *
     * @throws APIException
     */
    public function getByPath(
        string $filePath,
        ?array $properties = null,
        ?RequestOptions $requestOptions = null,
    ): FileStat {
        $params = Util::removeNulls(['properties' => $properties]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByPath($filePath, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the status of requested import.
     *
     * @param string $taskID Import by URL task ID
     *
     * @throws APIException
     */
    public function getImportTaskStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FileActionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getImportTaskStatus($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Generates signed URL that allows temporary access to a private file.
     *
     * @param string $fileID ID of file
     * @param int $expirationSeconds how long in seconds the link will provide access to the file
     * @param 'icon'|'medium'|'preview'|'thumb'|Size $size For image files. This will resize the image to the desired size before sharing. Does not affect the original file, just the file served by this signed URL.
     * @param bool $upscale if size is provided, this will upscale the image to fit the size dimensions
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        ?int $expirationSeconds = null,
        string|Size|null $size = null,
        ?bool $upscale = null,
        ?RequestOptions $requestOptions = null,
    ): SignedURL {
        $params = Util::removeNulls(
            [
                'expirationSeconds' => $expirationSeconds,
                'size' => $size,
                'upscale' => $upscale,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getSignedURL($fileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Asynchronously imports the file at the given URL into the file manager.
     *
     * @param 'HIDDEN_INDEXABLE'|'HIDDEN_NOT_INDEXABLE'|'HIDDEN_PRIVATE'|'HIDDEN_SENSITIVE'|'PRIVATE'|'PUBLIC_INDEXABLE'|'PUBLIC_NOT_INDEXABLE'|'SENSITIVE'|\HubspotSDK\Files\FileOperations\FileOperationImportFromURLAsyncParams\Access $access PUBLIC_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines can index the file. PUBLIC_NOT_INDEXABLE: File is publicly accessible by anyone who has the URL. Search engines *can't* index the file. PRIVATE: File is NOT publicly accessible. Requires a signed URL to see content. Search engines *can't* index the file.
     * @param string $url URL to download the new file from
     * @param 'ENTIRE_PORTAL'|'EXACT_FOLDER'|DuplicateValidationScope $duplicateValidationScope ENTIRE_PORTAL: Look for a duplicate file in the entire account. EXACT_FOLDER: Look for a duplicate file in the provided folder.
     * @param 'NONE'|'REJECT'|'RETURN_EXISTING'|DuplicateValidationStrategy $duplicateValidationStrategy NONE: Do not run any duplicate validation. REJECT: Reject the upload if a duplicate is found. RETURN_EXISTING: If a duplicate file is found, do not upload a new file and return the found duplicate instead.
     * @param string|\DateTimeInterface $expiresAt specifies the date and time when the file will expire
     * @param string $folderID One of folderId or folderPath is required. Destination folderId for the uploaded file.
     * @param string $folderPath One of folderPath or folderId is required. Destination folder path for the uploaded file. If the folder path does not exist, there will be an attempt to create the folder path.
     * @param string $name name to give the resulting file in the file manager
     * @param bool $overwrite If true, will overwrite existing file if one with the same name and extension exists in the given folder. The overwritten file will be deleted and the uploaded file will take its place with a new ID. If unset or set as false, the new file's name will be updated to prevent colliding with existing file if one exists with the same path, name, and extension
     * @param string $ttl Time to live. If specified the file will be deleted after the given time frame. If left unset, the file will exist indefinitely
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        string|\HubspotSDK\Files\FileOperations\FileOperationImportFromURLAsyncParams\Access $access,
        string $url,
        string|DuplicateValidationScope|null $duplicateValidationScope = null,
        string|DuplicateValidationStrategy|null $duplicateValidationStrategy = null,
        string|\DateTimeInterface|null $expiresAt = null,
        ?string $folderID = null,
        ?string $folderPath = null,
        ?string $name = null,
        ?bool $overwrite = null,
        ?string $ttl = null,
        ?RequestOptions $requestOptions = null,
    ): ImportFromURLTaskLocator {
        $params = Util::removeNulls(
            [
                'access' => $access,
                'url' => $url,
                'duplicateValidationScope' => $duplicateValidationScope,
                'duplicateValidationStrategy' => $duplicateValidationStrategy,
                'expiresAt' => $expiresAt,
                'folderID' => $folderID,
                'folderPath' => $folderPath,
                'name' => $name,
                'overwrite' => $overwrite,
                'ttl' => $ttl,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->importFromURLAsync(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Replace existing file data with new file data. Can be used to change image content without having to upload a new file and update all references.
     *
     * @param string $fileID ID of the desired file
     * @param string $charsetHunch character set of given file data
     * @param string $file file data that will replace existing file in the file manager
     * @param string $options JSON string representing FileReplaceOptions. Includes options to set the access and expiresAt properties, which will automatically update when the file is replaced.
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        ?string $charsetHunch = null,
        ?string $file = null,
        ?string $options = null,
        ?RequestOptions $requestOptions = null,
    ): File {
        $params = Util::removeNulls(
            ['charsetHunch' => $charsetHunch, 'file' => $file, 'options' => $options]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replace($fileID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Search through files in the file manager. Does not display hidden or archived files.
     *
     * @param string $after Offset search results by this value. The default offset is 0 and the maximum offset of items for a given search is 10,000. Narrow your search down if you are reaching this limit.
     * @param bool $allowsAnonymousAccess Search files by access. If `true`, will show only public files. If `false`, will show only private files.
     * @param string|\DateTimeInterface $createdAt search files by time of creation
     * @param string|\DateTimeInterface $createdAtGte Search files by greater than or equal to time of creation. Can be used with `createdAtLte` to create a range.
     * @param string|\DateTimeInterface $createdAtLte Search files by less than or equal to time of creation. Can be used with `createdAtGte` to create a range.
     * @param string $encoding search files by specified encoding
     * @param string|\DateTimeInterface $expiresAt Search files by exact expires time. Time must be epoch time in milliseconds.
     * @param string|\DateTimeInterface $expiresAtGte Search files by greater than or equal to expires time. Can be used with `expiresAtLte` to create a range.
     * @param string|\DateTimeInterface $expiresAtLte Search files by less than or equal to expires time. Can be used with `expiresAtGte` to create a range.
     * @param string $extension search files by given extension
     * @param string $fileMd5 search files by a specific md5 hash
     * @param int $height search files by height of image or video
     * @param int $heightGte Search files by greater than or equal to height of image or video. Can be used with `heightLte` to create a range.
     * @param int $heightLte Search files by less than or equal to height of image or video. Can be used with `heightGte` to create a range.
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
     * @param string|\DateTimeInterface $updatedAt search files by time of latest updated
     * @param string|\DateTimeInterface $updatedAtGte Search files by greater than or equal to time of latest update. Can be used with `updatedAtLte` to create a range.
     * @param string|\DateTimeInterface $updatedAtLte Search files by less than or equal to time of latest update. Can be used with `updatedAtGte` to create a range.
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
        ?string $after = null,
        ?bool $allowsAnonymousAccess = null,
        ?string $before = null,
        string|\DateTimeInterface|null $createdAt = null,
        string|\DateTimeInterface|null $createdAtGte = null,
        string|\DateTimeInterface|null $createdAtLte = null,
        ?string $encoding = null,
        string|\DateTimeInterface|null $expiresAt = null,
        string|\DateTimeInterface|null $expiresAtGte = null,
        string|\DateTimeInterface|null $expiresAtLte = null,
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
        string|\DateTimeInterface|null $updatedAt = null,
        string|\DateTimeInterface|null $updatedAtGte = null,
        string|\DateTimeInterface|null $updatedAtLte = null,
        ?string $url = null,
        ?int $width = null,
        ?int $widthGte = null,
        ?int $widthLte = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'allowsAnonymousAccess' => $allowsAnonymousAccess,
                'before' => $before,
                'createdAt' => $createdAt,
                'createdAtGte' => $createdAtGte,
                'createdAtLte' => $createdAtLte,
                'encoding' => $encoding,
                'expiresAt' => $expiresAt,
                'expiresAtGte' => $expiresAtGte,
                'expiresAtLte' => $expiresAtLte,
                'extension' => $extension,
                'fileMd5' => $fileMd5,
                'height' => $height,
                'heightGte' => $heightGte,
                'heightLte' => $heightLte,
                'idGte' => $idGte,
                'idLte' => $idLte,
                'ids' => $ids,
                'isUsableInContent' => $isUsableInContent,
                'limit' => $limit,
                'name' => $name,
                'parentFolderIDs' => $parentFolderIDs,
                'path' => $path,
                'properties' => $properties,
                'size' => $size,
                'sizeGte' => $sizeGte,
                'sizeLte' => $sizeLte,
                'sort' => $sort,
                'type' => $type,
                'updatedAt' => $updatedAt,
                'updatedAtGte' => $updatedAtGte,
                'updatedAtLte' => $updatedAtLte,
                'url' => $url,
                'width' => $width,
                'widthGte' => $widthGte,
                'widthLte' => $widthLte,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->search(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload a single file with content specified in request body.
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
        ?string $charsetHunch = null,
        ?string $file = null,
        ?string $fileName = null,
        ?string $folderID = null,
        ?string $folderPath = null,
        ?string $options = null,
        ?RequestOptions $requestOptions = null,
    ): File {
        $params = Util::removeNulls(
            [
                'charsetHunch' => $charsetHunch,
                'file' => $file,
                'fileName' => $fileName,
                'folderID' => $folderID,
                'folderPath' => $folderPath,
                'options' => $options,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upload(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
