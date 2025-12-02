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
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\TaskLocator;

interface SourceCodeContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param array<mixed>|SourceCodeCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $filePath,
        array|SourceCodeCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param array<mixed>|SourceCodeDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $filePath,
        array|SourceCodeDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|SourceCodeExtractAsyncParams $params
     *
     * @throws APIException
     */
    public function extractAsync(
        array|SourceCodeExtractAsyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): TaskLocator;

    /**
     * @api
     *
     * @param array<mixed>|SourceCodeGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $filePath,
        array|SourceCodeGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getExtractionStatus(
        int $taskID,
        ?RequestOptions $requestOptions = null
    ): ActionResponse;

    /**
     * @api
     *
     * @param array<mixed>|SourceCodeGetMetadataParams $params
     *
     * @throws APIException
     */
    public function getMetadata(
        string $filePath,
        array|SourceCodeGetMetadataParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param array<mixed>|SourceCodeUpsertParams $params
     *
     * @throws APIException
     */
    public function upsert(
        string $filePath,
        array|SourceCodeUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param array<mixed>|SourceCodeValidateParams $params
     *
     * @throws APIException
     */
    public function validate(
        string $filePath,
        array|SourceCodeValidateParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;
}
