<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\ActionResponse;
use HubspotSDK\Cms\SourceCode\AssetFileMetadata;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\TaskLocator;

use const HubspotSDK\Core\OMIT as omit;

interface SourceCodeContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $environment
     * @param string $file
     *
     * @throws APIException
     */
    public function create(
        string $path,
        $environment,
        $file = omit,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @deprecated
     *
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $path,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param string $environment
     *
     * @throws APIException
     */
    public function delete(
        string $path,
        $environment,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $path,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $path
     *
     * @throws APIException
     */
    public function extractAsync(
        $path,
        ?RequestOptions $requestOptions = null
    ): TaskLocator;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function extractAsyncRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TaskLocator;

    /**
     * @api
     *
     * @param string $environment
     *
     * @throws APIException
     */
    public function get(
        string $path,
        $environment,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $path,
        array $params,
        ?RequestOptions $requestOptions = null
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
     * @param string $environment
     * @param string $properties
     *
     * @throws APIException
     */
    public function getMetadata(
        string $path,
        $environment,
        $properties = omit,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getMetadataRaw(
        string $path,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param string $environment
     * @param string $file
     *
     * @throws APIException
     */
    public function upsert(
        string $path,
        $environment,
        $file = omit,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function upsertRaw(
        string $path,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param string $environment
     * @param string $file
     *
     * @throws APIException
     */
    public function validate(
        string $path,
        $environment,
        $file = omit,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function validateRaw(
        string $path,
        array $params,
        ?RequestOptions $requestOptions = null
    ): string;
}
