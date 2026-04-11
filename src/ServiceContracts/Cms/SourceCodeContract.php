<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms;

use HubSpotSDK\ActionResponse;
use HubSpotSDK\Cms\SourceCode\AssetFileMetadata;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\FileParam;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SourceCodeContract
{
    /**
     * @deprecated
     *
     * @api
     *
     * @param string $path Path param
     * @param string $environment Path param
     * @param string|FileParam $file Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $path,
        string $environment,
        string|FileParam|null $file = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $path,
        string $environment,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param string $path the file system location where the zip file is to be extracted
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $path,
        string $environment,
        RequestOptions|array|null $requestOptions = null,
    ): string;

    /**
     * @api
     *
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
     * @param string $path Path param
     * @param string $environment Path param
     * @param string $properties Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getMetadata(
        string $path,
        string $environment,
        ?string $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param string $path Path param
     * @param string $environment Path param
     * @param string|FileParam $file Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsert(
        string $path,
        string $environment,
        string|FileParam|null $file = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param string $path Path param
     * @param string $environment Path param
     * @param string|FileParam $file Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function validate(
        string $path,
        string $environment,
        string|FileParam|null $file = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
