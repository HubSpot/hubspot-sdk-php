<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Files;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\FileParam;
use HubSpotSDK\Core\Util;
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
use HubSpotSDK\ServiceContracts\Files\FileAssetsContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class FileAssetsService implements FileAssetsContract
{
    /**
     * @api
     */
    public FileAssetsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FileAssetsRawService($client);
    }

    /**
     * @api
     *
     * Creates a folder.
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
    ): Folder {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'parentFolderID' => $parentFolderID,
                'parentPath' => $parentPath,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update properties of file by ID.
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
    ): File {
        $params = Util::removeNulls(
            [
                'clearExpires' => $clearExpires,
                'access' => $access,
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $fileID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $fileID,
        RequestOptions|array|null $requestOptions = null
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
     * @param list<string> $properties
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        ?array $properties = null,
        RequestOptions|array|null $requestOptions = null,
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
     * @param list<string> $properties
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByPath(
        string $path,
        ?array $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): FileStat {
        $params = Util::removeNulls(['properties' => $properties]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByPath($path, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the status of requested import.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getImportTaskStatus(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
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
    ): ImportFromURLTaskLocator {
        $params = Util::removeNulls(
            [
                'access' => $access,
                'duplicateValidationScope' => $duplicateValidationScope,
                'duplicateValidationStrategy' => $duplicateValidationStrategy,
                'overwrite' => $overwrite,
                'expiresAt' => $expiresAt,
                'folderID' => $folderID,
                'folderPath' => $folderPath,
                'name' => $name,
                'ttl' => $ttl,
                'url' => $url,
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
