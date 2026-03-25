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
     * @param string $path Path param: The specific path within the environment where the content file will be stored. This should be a valid path string.
     * @param string $environment Path param: The environment in which the content file will be uploaded. Typically represents different stages like 'staging' or 'production'.
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
     * @param string $path The specific path to the content file that you want to delete. This should be a valid path string.
     * @param string $environment The environment from which the content file will be deleted. This could refer to different stages such as development, staging, or production.
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
     * @param string $path The path to the content file within the specified environment. This should be a valid string that represents the location of the content file.
     * @param string $environment The environment from which to retrieve the content. This identifies the specific context or stage of the content, such as 'staging' or 'production'.
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
     * @param int $taskID The unique identifier of the task whose status is being retrieved. It is an integer value.
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
     * @param string $path path param: The path to the specific file or folder for which metadata is being retrieved
     * @param string $environment path param: The environment in which the file or directory is located, such as 'staging' or 'production'
     * @param string $properties query param: A comma-separated list of specific metadata properties to include in the response
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
     * @param string $path Path param: The path to the content file that you want to update. This should be a string representing the file's location.
     * @param string $environment path param: The environment in which the content file is located, such as 'staging' or 'production'
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
     * @param string $path Path param: The path of the source code file to validate. This should be a string that matches the file's location within the environment.
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
