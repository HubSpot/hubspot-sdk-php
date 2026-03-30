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
     * @param string $path Path param
     * @param string $environment Path param
     * @param string $file Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $path,
        string $environment,
        ?string $file = null,
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
     * @param string $file Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsert(
        string $path,
        string $environment,
        ?string $file = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssetFileMetadata;

    /**
     * @api
     *
     * @param string $path Path param
     * @param string $environment Path param
     * @param string $file Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function validate(
        string $path,
        string $environment,
        ?string $file = null,
        RequestOptions|array|null $requestOptions = null,
    ): string;
}
