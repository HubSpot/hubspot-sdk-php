<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Files;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Files\File;
use HubSpotSDK\Files\FileActionResponse;
use HubSpotSDK\Files\FileAssets\FileAssetCreateParams;
use HubSpotSDK\Files\FileAssets\FileAssetGetParams;
use HubSpotSDK\Files\FileAssets\FileAssetGetSignedURLParams;
use HubSpotSDK\Files\FileAssets\FileAssetImportFromURLAsyncParams;
use HubSpotSDK\Files\FileAssets\FileAssetReplaceParams;
use HubSpotSDK\Files\FileAssets\FileAssetSearchParams;
use HubSpotSDK\Files\FileAssets\FileAssetUpdateParams;
use HubSpotSDK\Files\FileAssets\FileAssetUploadParams;
use HubSpotSDK\Files\Folder;
use HubSpotSDK\Files\ImportFromURLTaskLocator;
use HubSpotSDK\Files\SignedURL;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
