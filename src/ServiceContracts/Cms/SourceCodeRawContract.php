<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\ActionResponse;
use HubspotSDK\Cms\SourceCode\AssetFileMetadata;
use HubspotSDK\Cms\SourceCode\SourceCodeCreateParams;
use HubspotSDK\Cms\SourceCode\SourceCodeDeleteParams;
use HubspotSDK\Cms\SourceCode\SourceCodeExtractAsyncParams;
use HubspotSDK\Cms\SourceCode\SourceCodeGetMetadataParams;
use HubspotSDK\Cms\SourceCode\SourceCodeGetParams;
use HubspotSDK\Cms\SourceCode\SourceCodeUpsertParams;
use HubspotSDK\Cms\SourceCode\SourceCodeValidateParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SourceCodeRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $path Path param: The specific path within the environment where the content file will be stored. This should be a valid path string.
     * @param array<string,mixed>|SourceCodeCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssetFileMetadata>
     *
     * @throws APIException
     */
    public function create(
        string $path,
        array|SourceCodeCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $path The specific path to the content file that you want to delete. This should be a valid path string.
     * @param array<string,mixed>|SourceCodeDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $path,
        array|SourceCodeDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SourceCodeExtractAsyncParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TaskLocator>
     *
     * @throws APIException
     */
    public function extractAsync(
        array|SourceCodeExtractAsyncParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $path The path to the content file within the specified environment. This should be a valid string that represents the location of the content file.
     * @param array<string,mixed>|SourceCodeGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function get(
        string $path,
        array|SourceCodeGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $taskID The unique identifier of the task whose status is being retrieved. It is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponse>
     *
     * @throws APIException
     */
    public function getExtractionStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $path path param: The path to the specific file or folder for which metadata is being retrieved
     * @param array<string,mixed>|SourceCodeGetMetadataParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssetFileMetadata>
     *
     * @throws APIException
     */
    public function getMetadata(
        string $path,
        array|SourceCodeGetMetadataParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $path Path param: The path to the content file that you want to update. This should be a string representing the file's location.
     * @param array<string,mixed>|SourceCodeUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssetFileMetadata>
     *
     * @throws APIException
     */
    public function upsert(
        string $path,
        array|SourceCodeUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $path Path param: The path of the source code file to validate. This should be a string that matches the file's location within the environment.
     * @param array<string,mixed>|SourceCodeValidateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function validate(
        string $path,
        array|SourceCodeValidateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
