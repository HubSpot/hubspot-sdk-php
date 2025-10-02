<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\Files\FileCreateParams;
use HubspotSDK\Files\FileGetByPathParams;
use HubspotSDK\Files\FileGetMetadataParams;
use HubspotSDK\Files\FileGetSignedURLParams;
use HubspotSDK\Files\FileGetSignedURLParams\Size;
use HubspotSDK\Files\FileImportFromURLParams;
use HubspotSDK\Files\FileImportFromURLParams\Access;
use HubspotSDK\Files\FileImportFromURLParams\DuplicateValidationScope;
use HubspotSDK\Files\FileImportFromURLParams\DuplicateValidationStrategy;
use HubspotSDK\Files\FileReadParams;
use HubspotSDK\Files\FileReplaceParams;
use HubspotSDK\Files\FilesCollectionResponseFile;
use HubspotSDK\Files\FileSearchParams;
use HubspotSDK\Files\FilesFile;
use HubspotSDK\Files\FilesFileActionResponse;
use HubspotSDK\Files\FilesFileStat;
use HubspotSDK\Files\FilesFolder;
use HubspotSDK\Files\FilesFolderActionResponse;
use HubspotSDK\Files\FilesFolderUpdateTaskLocator;
use HubspotSDK\Files\FilesImportFromURLTaskLocator;
use HubspotSDK\Files\FilesSignedURL;
use HubspotSDK\Files\FileUpdatePropertiesParams;
use HubspotSDK\Files\FileUpdatePropertiesRecursivelyParams;
use HubspotSDK\Files\FileUploadParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\FilesContract;

use const HubspotSDK\Core\OMIT as omit;

final class FilesService implements FilesContract
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
     * @return FilesFolder<HasRawResponse>
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
     * @return FilesFolder<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolder {
        [$parsed, $options] = FileCreateParams::parseRequest(
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
    public function delete(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($folderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
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
    public function archiveByPath(
        string $folderPath,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->archiveByPathRaw($folderPath, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function archiveByPathRaw(
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
     * Check import status
     *
     * @return FilesFileActionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function checkImport(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FilesFileActionResponse {
        $params = [];

        return $this->checkImportRaw($taskID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return FilesFileActionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function checkImportRaw(
        string $taskID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): FilesFileActionResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/files/import-from-url/async/tasks/%1$s/status', $taskID],
            options: $requestOptions,
            convert: FilesFileActionResponse::class,
        );
    }

    /**
     * @api
     *
     * Check folder update status
     *
     * @return FilesFolderActionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function checkUpdateStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FilesFolderActionResponse {
        $params = [];

        return $this->checkUpdateStatusRaw($taskID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return FilesFolderActionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function checkUpdateStatusRaw(
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
     * Retrieve folder by path
     *
     * @param list<string> $properties
     *
     * @return FilesFolder<HasRawResponse>
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
     * @return FilesFolder<HasRawResponse>
     *
     * @throws APIException
     */
    public function getByPathRaw(
        string $folderPath,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolder {
        [$parsed, $options] = FileGetByPathParams::parseRequest(
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
     * Retrieve file by path
     *
     * @param list<string> $properties
     *
     * @return FilesFileStat<HasRawResponse>
     *
     * @throws APIException
     */
    public function getMetadata(
        string $path,
        $properties = omit,
        ?RequestOptions $requestOptions = null
    ): FilesFileStat {
        $params = ['properties' => $properties];

        return $this->getMetadataRaw($path, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FilesFileStat<HasRawResponse>
     *
     * @throws APIException
     */
    public function getMetadataRaw(
        string $path,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFileStat {
        [$parsed, $options] = FileGetMetadataParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/files/stat/%1$s', $path],
            query: $parsed,
            options: $options,
            convert: FilesFileStat::class,
        );
    }

    /**
     * @api
     *
     * Get signed URL to access private file
     *
     * @param int $expirationSeconds
     * @param Size|value-of<Size> $size
     * @param bool $upscale
     *
     * @return FilesSignedURL<HasRawResponse>
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        $expirationSeconds = omit,
        $size = omit,
        $upscale = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesSignedURL {
        $params = [
            'expirationSeconds' => $expirationSeconds,
            'size' => $size,
            'upscale' => $upscale,
        ];

        return $this->getSignedURLRaw($fileID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FilesSignedURL<HasRawResponse>
     *
     * @throws APIException
     */
    public function getSignedURLRaw(
        string $fileID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesSignedURL {
        [$parsed, $options] = FileGetSignedURLParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/files/%1$s/signed-url', $fileID],
            query: $parsed,
            options: $options,
            convert: FilesSignedURL::class,
        );
    }

    /**
     * @api
     *
     * Import file from URL
     *
     * @param Access|value-of<Access> $access
     * @param string $url
     * @param DuplicateValidationScope|value-of<DuplicateValidationScope> $duplicateValidationScope
     * @param DuplicateValidationStrategy|value-of<DuplicateValidationStrategy> $duplicateValidationStrategy
     * @param \DateTimeInterface $expiresAt
     * @param string $folderID
     * @param string $folderPath
     * @param string $name
     * @param bool $overwrite
     * @param string $ttl
     *
     * @return FilesImportFromURLTaskLocator<HasRawResponse>
     *
     * @throws APIException
     */
    public function importFromURL(
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
    ): FilesImportFromURLTaskLocator {
        $params = [
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
        ];

        return $this->importFromURLRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FilesImportFromURLTaskLocator<HasRawResponse>
     *
     * @throws APIException
     */
    public function importFromURLRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesImportFromURLTaskLocator {
        [$parsed, $options] = FileImportFromURLParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'files/v3/files/import-from-url/async',
            body: (object) $parsed,
            options: $options,
            convert: FilesImportFromURLTaskLocator::class,
        );
    }

    /**
     * @api
     *
     * GDPR-delete file
     *
     * @throws APIException
     */
    public function purge(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->purgeRaw($fileID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function purgeRaw(
        string $fileID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['files/v3/files/%1$s/gdpr-delete', $fileID],
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
     * @return FilesFolder<HasRawResponse>
     *
     * @throws APIException
     */
    public function read(
        string $folderID,
        $properties = omit,
        ?RequestOptions $requestOptions = null
    ): FilesFolder {
        $params = ['properties' => $properties];

        return $this->readRaw($folderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FilesFolder<HasRawResponse>
     *
     * @throws APIException
     */
    public function readRaw(
        string $folderID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolder {
        [$parsed, $options] = FileReadParams::parseRequest(
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
     * Replace file
     *
     * @param string $charsetHunch
     * @param string $file
     * @param string $options
     *
     * @return FilesFile<HasRawResponse>
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        $charsetHunch = omit,
        $file = omit,
        $options = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesFile {
        $params = [
            'charsetHunch' => $charsetHunch, 'file' => $file, 'options' => $options,
        ];

        return $this->replaceRaw($fileID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FilesFile<HasRawResponse>
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $fileID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFile {
        [$parsed, $options] = FileReplaceParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['files/v3/files/%1$s', $fileID],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: FilesFile::class,
        );
    }

    /**
     * @api
     *
     * Search files
     *
     * @param string $after
     * @param bool $allowsAnonymousAccess
     * @param string $before
     * @param \DateTimeInterface $createdAt
     * @param \DateTimeInterface $createdAtGte
     * @param \DateTimeInterface $createdAtLte
     * @param string $encoding
     * @param \DateTimeInterface $expiresAt
     * @param \DateTimeInterface $expiresAtGte
     * @param \DateTimeInterface $expiresAtLte
     * @param string $extension
     * @param string $fileMd5
     * @param int $height
     * @param int $heightGte
     * @param int $heightLte
     * @param int $idGte
     * @param int $idLte
     * @param list<int> $ids
     * @param bool $isUsableInContent
     * @param int $limit
     * @param string $name
     * @param list<int> $parentFolderIDs
     * @param string $path
     * @param list<string> $properties
     * @param int $size
     * @param int $sizeGte
     * @param int $sizeLte
     * @param list<string> $sort
     * @param string $type
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $updatedAtGte
     * @param \DateTimeInterface $updatedAtLte
     * @param string $url
     * @param int $width
     * @param int $widthGte
     * @param int $widthLte
     *
     * @return FilesCollectionResponseFile<HasRawResponse>
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
    ): FilesCollectionResponseFile {
        $params = [
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
        ];

        return $this->searchRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FilesCollectionResponseFile<HasRawResponse>
     *
     * @throws APIException
     */
    public function searchRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesCollectionResponseFile {
        [$parsed, $options] = FileSearchParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'files/v3/files/search',
            query: $parsed,
            options: $options,
            convert: FilesCollectionResponseFile::class,
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
     * @return FilesFolder<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateProperties(
        string $folderID,
        $name = omit,
        $parentFolderID = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesFolder {
        $params = ['name' => $name, 'parentFolderID' => $parentFolderID];

        return $this->updatePropertiesRaw($folderID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FilesFolder<HasRawResponse>
     *
     * @throws APIException
     */
    public function updatePropertiesRaw(
        string $folderID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolder {
        [$parsed, $options] = FileUpdatePropertiesParams::parseRequest(
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

    /**
     * @api
     *
     * Update folder properties
     *
     * @param string $id
     * @param string $name
     * @param int $parentFolderID
     *
     * @return FilesFolderUpdateTaskLocator<HasRawResponse>
     *
     * @throws APIException
     */
    public function updatePropertiesRecursively(
        $id,
        $name = omit,
        $parentFolderID = omit,
        ?RequestOptions $requestOptions = null,
    ): FilesFolderUpdateTaskLocator {
        $params = [
            'id' => $id, 'name' => $name, 'parentFolderID' => $parentFolderID,
        ];

        return $this->updatePropertiesRecursivelyRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FilesFolderUpdateTaskLocator<HasRawResponse>
     *
     * @throws APIException
     */
    public function updatePropertiesRecursivelyRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFolderUpdateTaskLocator {
        [$parsed, $options] = FileUpdatePropertiesRecursivelyParams::parseRequest(
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
     * Upload file
     *
     * @param string $charsetHunch
     * @param string $file
     * @param string $fileName
     * @param string $folderID
     * @param string $folderPath
     * @param string $options
     *
     * @return FilesFile<HasRawResponse>
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
    ): FilesFile {
        $params = [
            'charsetHunch' => $charsetHunch,
            'file' => $file,
            'fileName' => $fileName,
            'folderID' => $folderID,
            'folderPath' => $folderPath,
            'options' => $options,
        ];

        return $this->uploadRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return FilesFile<HasRawResponse>
     *
     * @throws APIException
     */
    public function uploadRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): FilesFile {
        [$parsed, $options] = FileUploadParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'files/v3/files',
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) $parsed,
            options: $options,
            convert: FilesFile::class,
        );
    }
}
