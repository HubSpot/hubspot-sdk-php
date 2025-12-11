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
     * @param string $filePath path param: The file system location of the file
     * @param string $environment path param: The environment of the file ("draft" or "published")
     * @param string $file Body param:
     *
     * @throws APIException
     */
    public function create(
        string $filePath,
        string $environment,
        ?string $file = null,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata {
        $params = Util::removeNulls(
            ['environment' => $environment, 'file' => $file]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($filePath, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the file at the specified path in the specified environment.
     *
     * @param string $filePath the file system location of the file
     * @param string $environment the environment of the file ("draft" or "published")
     *
     * @throws APIException
     */
    public function delete(
        string $filePath,
        string $environment,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['environment' => $environment]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($filePath, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Extract a zip file in the developer file system. Extraction status can be checked with the `/extract/async/tasks/taskId/status` endpoint below.
     *
     * @throws APIException
     */
    public function extractAsync(
        string $path,
        ?RequestOptions $requestOptions = null
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
     * @param string $filePath the file system location of the file
     * @param string $environment the environment of the file ("draft" or "published")
     *
     * @throws APIException
     */
    public function get(
        string $filePath,
        string $environment,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = Util::removeNulls(['environment' => $environment]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($filePath, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the status of an extraction by the `taskId` returned from the initial `extract/async` request.
     *
     * @param int $taskID the extraction task ID returned by the initial `extract/async` request
     *
     * @throws APIException
     */
    public function getExtractionStatus(
        int $taskID,
        ?RequestOptions $requestOptions = null
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
     * @param string $filePath path param: The file system location of the file
     * @param string $environment path param: The environment of the file ("draft" or "published")
     * @param string $properties Query param:
     *
     * @throws APIException
     */
    public function getMetadata(
        string $filePath,
        string $environment,
        ?string $properties = null,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata {
        $params = Util::removeNulls(
            ['environment' => $environment, 'properties' => $properties]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getMetadata($filePath, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upserts a file at the specified path in the specified environment. Accepts multipart/form-data content type.
     *
     * @param string $filePath path param: The file system location of the file
     * @param string $environment path param: The environment of the file ("draft" or "published")
     * @param string $file Body param:
     *
     * @throws APIException
     */
    public function upsert(
        string $filePath,
        string $environment,
        ?string $file = null,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata {
        $params = Util::removeNulls(
            ['environment' => $environment, 'file' => $file]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsert($filePath, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Validates the file contents passed to the endpoint given a specified path and environment. Accepts multipart/form-data content type.
     *
     * @param string $filePath path param: The file system location of the file
     * @param string $environment Path param:
     * @param string $file Body param:
     *
     * @throws APIException
     */
    public function validate(
        string $filePath,
        string $environment,
        ?string $file = null,
        ?RequestOptions $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            ['environment' => $environment, 'file' => $file]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->validate($filePath, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
