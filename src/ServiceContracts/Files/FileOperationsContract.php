<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\FileOperations\FileOperationGetByPathParams;
use HubspotSDK\Files\FileOperations\FileOperationGetParams;
use HubspotSDK\Files\FileOperations\FileOperationGetSignedURLParams;
use HubspotSDK\Files\FileOperations\FileOperationImportFromURLAsyncParams;
use HubspotSDK\Files\FileOperations\FileOperationReplaceParams;
use HubspotSDK\Files\FileOperations\FileOperationSearchParams;
use HubspotSDK\Files\FileOperations\FileOperationUpdateParams;
use HubspotSDK\Files\FileOperations\FileOperationUploadParams;
use HubspotSDK\Files\FileStat;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Files\SignedURL;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface FileOperationsContract
{
    /**
     * @api
     *
     * @param array<mixed>|FileOperationUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        array|FileOperationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
     * @param array<mixed>|FileOperationGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        array|FileOperationGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param array<mixed>|FileOperationGetByPathParams $params
     *
     * @throws APIException
     */
    public function getByPath(
        string $filePath,
        array|FileOperationGetByPathParams $params,
        ?RequestOptions $requestOptions = null,
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
     * @param array<mixed>|FileOperationGetSignedURLParams $params
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        array|FileOperationGetSignedURLParams $params,
        ?RequestOptions $requestOptions = null,
    ): SignedURL;

    /**
     * @api
     *
     * @param array<mixed>|FileOperationImportFromURLAsyncParams $params
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        array|FileOperationImportFromURLAsyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): ImportFromURLTaskLocator;

    /**
     * @api
     *
     * @param array<mixed>|FileOperationReplaceParams $params
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        array|FileOperationReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param array<mixed>|FileOperationSearchParams $params
     *
     * @return Page<File>
     *
     * @throws APIException
     */
    public function search(
        array|FileOperationSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|FileOperationUploadParams $params
     *
     * @throws APIException
     */
    public function upload(
        array|FileOperationUploadParams $params,
        ?RequestOptions $requestOptions = null,
    ): File;
}
