<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\ActionResponse;
use HubspotSDK\Client;
use HubspotSDK\Cms\SourceCode\AssetFileMetadata;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\SourceCodeContract;
use HubspotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SourceCodeService implements SourceCodeContract
{
    /**
     * @api
     */
    public SourceCodeRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SourceCodeRawService($client);
    }

    /**
     * @deprecated
     *
     * @api
     *
     * Upload a content file to a specified environment and path in the HubSpot CMS. This endpoint allows you to add new content files to your HubSpot account by specifying the environment and path where the file should be stored. The request must include a file in binary format.
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
    ): AssetFileMetadata {
        $params = Util::removeNulls(
            ['environment' => $environment, 'file' => $file]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($path, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a specific content file from the specified environment in your HubSpot CMS. This operation is useful for removing outdated or unnecessary files from your source code repository. Ensure you have the necessary permissions to perform this action.
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
    ): mixed {
        $params = Util::removeNulls(['environment' => $environment]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($path, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Initiate an asynchronous extraction of source code files in the HubSpot CMS. This endpoint is useful for handling large file extractions without blocking the client application. Upon acceptance, it returns a task locator that can be used to check the status of the extraction process.
     *
     * @param string $path the file system location where the zip file is to be extracted
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function extractAsync(
        string $path,
        RequestOptions|array|null $requestOptions = null
    ): TaskLocator {
        $params = Util::removeNulls(['path' => $path]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->extractAsync(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve content from the specified environment and path in your HubSpot CMS. This endpoint allows you to access specific content files based on the environment and path parameters, which can be useful for managing and displaying content in different environments.
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
    ): string {
        $params = Util::removeNulls(['environment' => $environment]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($path, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the status of an asynchronous task related to source code extraction. This endpoint is useful for checking the progress or completion of a task initiated through the asynchronous file extraction process.
     *
     * @param int $taskID The unique identifier of the task whose status is being retrieved. It is an integer value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getExtractionStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): ActionResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getExtractionStatus($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve metadata for a specific file or folder within a specified environment in the HubSpot CMS. This endpoint is useful for obtaining detailed information about content files, such as their creation and update timestamps, and other metadata attributes.
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
    ): AssetFileMetadata {
        $params = Util::removeNulls(
            ['environment' => $environment, 'properties' => $properties]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getMetadata($path, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the content file in the specified environment and path within the HubSpot CMS. This operation allows you to upload a new file to replace the existing content at the given path. It is useful for managing and updating your website's source code files directly through the API.
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
    ): AssetFileMetadata {
        $params = Util::removeNulls(
            ['environment' => $environment, 'file' => $file]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsert($path, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Validate a source code file within a specified environment in your HubSpot account. This endpoint is useful for checking the correctness of code files before deployment or further processing. The validation process requires the file to be uploaded in a multipart/form-data request.
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
    ): string {
        $params = Util::removeNulls(
            ['environment' => $environment, 'file' => $file]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->validate($path, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
