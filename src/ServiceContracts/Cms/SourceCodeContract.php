<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms;

use HubspotSDK\ActionResponse;
use HubspotSDK\Cms\SourceCode\AssetFileMetadata;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SourceCodeContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $filePath path param: The file system location of the file
     * @param string $environment path param: The environment of the file ("draft" or "published")
     * @param string $file Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $filePath,
        string $environment,
        ?string $file = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param string $filePath the file system location of the file
     * @param string $environment the environment of the file ("draft" or "published")
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $filePath,
        string $environment,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function extractAsync(
        string $path,
        RequestOptions|array|null $requestOptions = null
    ): TaskLocator;

    /**
     * @api
     *
     * @param string $filePath the file system location of the file
     * @param string $environment the environment of the file ("draft" or "published")
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $filePath,
        string $environment,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param int $taskID the extraction task ID returned by the initial `extract/async` request
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getExtractionStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): ActionResponse;

    /**
     * @api
     *
     * @param string $filePath path param: The file system location of the file
     * @param string $environment path param: The environment of the file ("draft" or "published")
     * @param string $properties Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getMetadata(
        string $filePath,
        string $environment,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param string $filePath path param: The file system location of the file
     * @param string $environment path param: The environment of the file ("draft" or "published")
     * @param string $file Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsert(
        string $filePath,
        string $environment,
        ?string $file = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param string $filePath path param: The file system location of the file
     * @param string $environment Path param
     * @param string $file Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function validate(
        string $filePath,
        string $environment,
        ?string $file = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
