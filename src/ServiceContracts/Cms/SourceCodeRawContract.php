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

interface SourceCodeRawContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $filePath path param: The file system location of the file
     * @param array<string,mixed>|SourceCodeCreateParams $params
     *
     * @return BaseResponse<AssetFileMetadata>
     *
     * @throws APIException
     */
    public function create(
        string $filePath,
        array|SourceCodeCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $filePath the file system location of the file
     * @param array<string,mixed>|SourceCodeDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $filePath,
        array|SourceCodeDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|SourceCodeExtractAsyncParams $params
     *
     * @return BaseResponse<TaskLocator>
     *
     * @throws APIException
     */
    public function extractAsync(
        array|SourceCodeExtractAsyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $filePath the file system location of the file
     * @param array<string,mixed>|SourceCodeGetParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function get(
        string $filePath,
        array|SourceCodeGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $taskID the extraction task ID returned by the initial `extract/async` request
     *
     * @return BaseResponse<ActionResponse>
     *
     * @throws APIException
     */
    public function getExtractionStatus(
        int $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $filePath path param: The file system location of the file
     * @param array<string,mixed>|SourceCodeGetMetadataParams $params
     *
     * @return BaseResponse<AssetFileMetadata>
     *
     * @throws APIException
     */
    public function getMetadata(
        string $filePath,
        array|SourceCodeGetMetadataParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $filePath path param: The file system location of the file
     * @param array<string,mixed>|SourceCodeUpsertParams $params
     *
     * @return BaseResponse<AssetFileMetadata>
     *
     * @throws APIException
     */
    public function upsert(
        string $filePath,
        array|SourceCodeUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $filePath path param: The file system location of the file
     * @param array<string,mixed>|SourceCodeValidateParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function validate(
        string $filePath,
        array|SourceCodeValidateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
