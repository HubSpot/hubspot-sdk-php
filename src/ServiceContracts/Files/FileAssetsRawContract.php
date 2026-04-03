<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Files;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\FileAssets\FileAssetCreateParams;
use HubspotSDK\Files\FileAssets\FileAssetGetByPathParams;
use HubspotSDK\Files\FileAssets\FileAssetGetParams;
use HubspotSDK\Files\FileAssets\FileAssetGetSignedURLParams;
use HubspotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams;
use HubspotSDK\Files\FileAssets\FileAssetReplaceParams;
use HubspotSDK\Files\FileAssets\FileAssetSearchParams;
use HubspotSDK\Files\FileAssets\FileAssetUpdateParams;
use HubspotSDK\Files\FileAssets\FileAssetUploadParams;
use HubspotSDK\Files\FileStat;
use HubspotSDK\Files\Folder;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Files\SignedURL;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface FileAssetsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|FileAssetCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Folder>
     *
     * @throws APIException
     */
    public function create(
        array|FileAssetCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FileAssetUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function update(
        string $fileID,
        array|FileAssetUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $fileID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function gdprDelete(
        string $fileID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FileAssetGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function get(
        string $fileID,
        array|FileAssetGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FileAssetGetByPathParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FileStat>
     *
     * @throws APIException
     */
    public function getByPath(
        string $path,
        array|FileAssetGetByPathParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FileActionResponse>
     *
     * @throws APIException
     */
    public function getImportTaskStatus(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FileAssetGetSignedURLParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SignedURL>
     *
     * @throws APIException
     */
    public function getSignedURL(
        string $fileID,
        array|FileAssetGetSignedURLParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FileAssetImportFromURLAsyncParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ImportFromURLTaskLocator>
     *
     * @throws APIException
     */
    public function importFromURLAsync(
        array|FileAssetImportFromURLAsyncParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FileAssetReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function replace(
        string $fileID,
        array|FileAssetReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FileAssetSearchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<File>>
     *
     * @throws APIException
     */
    public function search(
        array|FileAssetSearchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FileAssetUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<File>
     *
     * @throws APIException
     */
    public function upload(
        array|FileAssetUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
