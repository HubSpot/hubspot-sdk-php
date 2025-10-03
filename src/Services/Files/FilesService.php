<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\Files\FileGetByPathParams;
use HubspotSDK\Files\Files\FileGetParams;
use HubspotSDK\Files\Files\FileGetSignedURLParams;
use HubspotSDK\Files\Files\FileGetSignedURLParams\Size;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationScope;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationStrategy;
use HubspotSDK\Files\Files\FileReplaceParams;
use HubspotSDK\Files\Files\FileSearchParams;
use HubspotSDK\Files\Files\FileUpdateParams;
use HubspotSDK\Files\Files\FileUpdateParams\Access;
use HubspotSDK\Files\Files\FileUploadParams;
use HubspotSDK\Files\FilesCollectionResponseFile;
use HubspotSDK\Files\FilesFile;
use HubspotSDK\Files\FilesFileActionResponse;
use HubspotSDK\Files\FilesFileStat;
use HubspotSDK\Files\FilesImportFromURLTaskLocator;
use HubspotSDK\Files\FilesSignedURL;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Files\FilesContract;

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
     * Update file properties
     *
     * @param Access|value-of<Access> $access
     * @param bool $clearExpires
     * @param \DateTimeInterface $expiresAt
     * @param bool $isUsableInContent
     * @param string $name
     * @param string $parentFolderID
     * @param string $parentFolderPath
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
    ): FilesFile {
        $params = [
            'access' => $access,
            'clearExpires' => $clearExpires,
            'expiresAt' => $expiresAt,
            'isUsableInContent' => $isUsableInContent,
            'name' => $name,
            'parentFolderID' => $parentFolderID,
            'parentFolderPath' => $parentFolderPath,
        ];

        return $this->updateRaw($fileID, $params, $requestOptions);
    }

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
    ): FilesFile {
        [$parsed, $options] = FileUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['files/v3/files/%1$s', $fileID],
            body: (object) $parsed,
            options: $options,
            convert: FilesFile::class,
        );
    }

    /**
     * @api
     *
     * Delete file by ID
     *
     * @throws APIException
     */
    public function delete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($fileID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $fileID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['files/v3/files/%1$s', $fileID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * GDPR-delete file
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->gdprDeleteRaw($fileID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function gdprDeleteRaw(
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
     * Retrieve file by ID
     *
     * @param list<string> $properties
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        $properties = omit,
        ?RequestOptions $requestOptions = null
    ): FilesFile {
        $params = ['properties' => $properties];

        return $this->getRaw($fileID, $params, $requestOptions);
    }

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
    ): FilesFile {
        [$parsed, $options] = FileGetParams::parseRequest($params, $requestOptions);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['files/v3/files/%1$s', $fileID],
            query: $parsed,
            options: $options,
            convert: FilesFile::class,
        );
    }

    /**
     * @api
     *
     * Retrieve file by path
     *
     * @param list<string> $properties
     *
     * @throws APIException
     */
    public function getByPath(
        string $path,
        $properties = omit,
        ?RequestOptions $requestOptions = null
    ): FilesFileStat {
        $params = ['properties' => $properties];

        return $this->getByPathRaw($path, $params, $requestOptions);
    }

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
    ): FilesFileStat {
        [$parsed, $options] = FileGetByPathParams::parseRequest(
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
     * Check import status
     *
     * @throws APIException
     */
    public function getImportFromURLAsyncStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FilesFileActionResponse {
        $params = [];

        return $this->getImportFromURLAsyncStatusRaw(
            $taskID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function getImportFromURLAsyncStatusRaw(
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
     * Get signed URL to access private file
     *
     * @param int $expirationSeconds
     * @param Size|value-of<Size> $size
     * @param bool $upscale
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
     * @param HubspotSDK\Files\Files\FileImportFromURLAsyncParams\Access|value-of<HubspotSDK\Files\Files\FileImportFromURLAsyncParams\Access> $access
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

        return $this->importFromURLAsyncRaw($params, $requestOptions);
    }

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
    ): FilesImportFromURLTaskLocator {
        [$parsed, $options] = FileImportFromURLAsyncParams::parseRequest(
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
     * Replace file
     *
     * @param string $charsetHunch
     * @param string $file
     * @param string $options
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
     * Upload file
     *
     * @param string $charsetHunch
     * @param string $file
     * @param string $fileName
     * @param string $folderID
     * @param string $folderPath
     * @param string $options
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
