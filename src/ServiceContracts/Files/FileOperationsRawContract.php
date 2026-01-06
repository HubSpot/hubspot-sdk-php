<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

use HubspotSDK\Core\Contracts\BaseResponse;
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

interface FileOperationsRawContract
{
    /**
     * @api
     *
     * @param string $fileID ID of file to update
     * @param array<mixed>|FileOperationUpdateParams $params
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        array|FileOperationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fileID FileId to delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fileID ID of file to GDPR delete
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $fileID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fileID ID of the desired file
     * @param array<mixed>|FileOperationGetParams $params
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        array|FileOperationGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $filePath the path of the file
     * @param array<mixed>|FileOperationGetByPathParams $params
     *
     * @return BaseResponse<FileStat>
     *
     * @throws APIException
     */
    public function getByPath(
        string $filePath,
        array|FileOperationGetByPathParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $taskID Import by URL task ID
     *
     * @return BaseResponse<FileActionResponse>
     *
     * @throws APIException
     */
    public function getImportTaskStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fileID ID of file
     * @param array<mixed>|FileOperationGetSignedURLParams $params
     *
     * @return BaseResponse<SignedURL>
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        array|FileOperationGetSignedURLParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FileOperationImportFromURLAsyncParams $params
     *
     * @return BaseResponse<ImportFromURLTaskLocator>
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        array|FileOperationImportFromURLAsyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $fileID ID of the desired file
     * @param array<mixed>|FileOperationReplaceParams $params
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        array|FileOperationReplaceParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FileOperationSearchParams $params
     *
     * @return BaseResponse<Page<File>>
     *
     * @throws APIException
     */
    public function search(
        array|FileOperationSearchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|FileOperationUploadParams $params
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function upload(
        array|FileOperationUploadParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
