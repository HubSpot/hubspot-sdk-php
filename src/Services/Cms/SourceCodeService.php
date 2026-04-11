<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\ActionResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Cms\SourceCode\AssetFileMetadata;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\FileParam;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\SourceCodeContract;
use HubSpotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * Creates a file at the specified path in the specified environment. Accepts multipart/form-data content type. Throws an error if a file already exists at the specified path.
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
     * Deletes the file at the specified path in the specified environment.
     *
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
     * Extract a zip file in the developer file system. Extraction status can be checked with the `/extract/async/tasks/taskId/status` endpoint below.
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
     * Downloads the byte contents of the file at the specified path in the specified environment.
     *
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
     * Get the status of an extraction by the `taskId` returned from the initial `extract/async` request.
     *
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
     * Gets the metadata object for the file at the specified path in the specified environment.
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
     * Upserts a file at the specified path in the specified environment. Accepts multipart/form-data content type.
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
     * Validates the file contents passed to the endpoint given a specified path and environment. Accepts multipart/form-data content type.
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
    ): string {
        $params = Util::removeNulls(
            ['environment' => $environment, 'file' => $file]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->validate($path, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
