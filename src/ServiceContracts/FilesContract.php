<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\Files\FileGetSignedURLParams\Size;
use HubspotSDK\Files\FileImportFromURLParams\Access;
use HubspotSDK\Files\FileImportFromURLParams\DuplicateValidationScope;
use HubspotSDK\Files\FileImportFromURLParams\DuplicateValidationStrategy;
use HubspotSDK\Files\FilesCollectionResponseFile;
use HubspotSDK\Files\FilesFile;
use HubspotSDK\Files\FilesFileActionResponse;
use HubspotSDK\Files\FilesFileStat;
use HubspotSDK\Files\FilesFolder;
use HubspotSDK\Files\FilesFolderActionResponse;
use HubspotSDK\Files\FilesFolderUpdateTaskLocator;
use HubspotSDK\Files\FilesImportFromURLTaskLocator;
use HubspotSDK\Files\FilesSignedURL;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface FilesContract
{
    /**
     * @api
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
    ): FilesFolder;

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
    ): FilesFolder;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $folderID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $folderID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function archiveByPath(
        string $folderPath,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function archiveByPathRaw(
        string $folderPath,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @return FilesFileActionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function checkImport(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FilesFileActionResponse;

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
    ): FilesFileActionResponse;

    /**
     * @api
     *
     * @return FilesFolderActionResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function checkUpdateStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FilesFolderActionResponse;

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
    ): FilesFolderActionResponse;

    /**
     * @api
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
    ): FilesFolder;

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
        ?RequestOptions $requestOptions = null,
    ): FilesFolder;

    /**
     * @api
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
    ): FilesFileStat;

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
    ): FilesFileStat;

    /**
     * @api
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
    ): FilesSignedURL;

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
    ): FilesSignedURL;

    /**
     * @api
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
    ): FilesImportFromURLTaskLocator;

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
    ): FilesImportFromURLTaskLocator;

    /**
     * @api
     *
     * @throws APIException
     */
    public function purge(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function purgeRaw(
        string $fileID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
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
        ?RequestOptions $requestOptions = null,
    ): FilesFolder;

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
    ): FilesFolder;

    /**
     * @api
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
    ): FilesFile;

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
    ): FilesFile;

    /**
     * @api
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
    ): FilesCollectionResponseFile;

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
    ): FilesCollectionResponseFile;

    /**
     * @api
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
    ): FilesFolder;

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
    ): FilesFolder;

    /**
     * @api
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
    ): FilesFolderUpdateTaskLocator;

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
    ): FilesFolderUpdateTaskLocator;

    /**
     * @api
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
    ): FilesFile;

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
    ): FilesFile;
}
