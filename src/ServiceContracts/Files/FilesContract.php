<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\Files\FileGetByPathParams;
use HubspotSDK\Files\Files\FileGetParams;
use HubspotSDK\Files\Files\FileGetSignedURLParams;
use HubspotSDK\Files\Files\FileImportFromURLAsyncParams;
use HubspotSDK\Files\Files\FileReplaceParams;
use HubspotSDK\Files\Files\FileSearchParams;
use HubspotSDK\Files\Files\FileUpdateParams;
use HubspotSDK\Files\Files\FileUploadParams;
use HubspotSDK\Files\FileStat;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Files\SignedURL;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface FilesContract
{
    /**
     * @api
     *
     * @param array<mixed>|FileUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        array|FileUpdateParams $params,
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
     * @param array<mixed>|FileGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        array|FileGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param array<mixed>|FileGetByPathParams $params
     *
     * @throws APIException
     */
    public function getByPath(
        string $path,
        array|FileGetByPathParams $params,
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
     * @param array<mixed>|FileGetSignedURLParams $params
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        array|FileGetSignedURLParams $params,
        ?RequestOptions $requestOptions = null,
    ): SignedURL;

    /**
     * @api
     *
     * @param array<mixed>|FileImportFromURLAsyncParams $params
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        array|FileImportFromURLAsyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): ImportFromURLTaskLocator;

    /**
     * @api
     *
     * @param array<mixed>|FileReplaceParams $params
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        array|FileReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): File;

    /**
     * @api
     *
     * @param array<mixed>|FileSearchParams $params
     *
     * @return Page<File>
     *
     * @throws APIException
     */
    public function search(
        array|FileSearchParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|FileUploadParams $params
     *
     * @throws APIException
     */
    public function upload(
        array|FileUploadParams $params,
        ?RequestOptions $requestOptions = null
    ): File;
}
