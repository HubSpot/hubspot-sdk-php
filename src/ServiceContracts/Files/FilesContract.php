<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\CollectionResponseFile;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\Files\FileGetSignedURLParams\Size;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationScope;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams\DuplicateValidationStrategy;
use HubspotSDK\Files\Files\FileUpdateParams\Access;
use HubspotSDK\Files\FileStat;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Files\SignedURL;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface FilesContract
{
    /**
     * @api
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
     * @param list<string> $properties
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
    public function getImportFromURLAsyncStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): FileActionResponse;

    /**
     * @api
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
    ): CollectionResponseFile;

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
    ): CollectionResponseFile;

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
