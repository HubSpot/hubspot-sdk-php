<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\ActionResponse;
use HubspotSDK\Client;
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
use HubspotSDK\ServiceContracts\Cms\SourceCodeContract;
use HubspotSDK\TaskLocator;

use const HubspotSDK\Core\OMIT as omit;

final class SourceCodeService implements SourceCodeContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @deprecated
     *
     * @api
     *
     * Creates a file at the specified path in the specified environment. Accepts multipart/form-data content type. Throws an error if a file already exists at the specified path.
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
    ): AssetFileMetadata {
        $params = ['environment' => $environment, 'file' => $file];

        return $this->createRaw($path, $params, $requestOptions);
    }

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
    ): AssetFileMetadata {
        [$parsed, $options] = SourceCodeCreateParams::parseRequest(
            $params,
            $requestOptions
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/source-code/%1$s/content/%2$s', $environment, $path],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) array_diff_key($parsed, ['environment']),
            options: $options,
            convert: AssetFileMetadata::class,
        );
    }

    /**
     * @api
     *
     * Deletes the file at the specified path in the specified environment.
     *
     * @param string $environment
     *
     * @throws APIException
     */
    public function delete(
        string $path,
        $environment,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['environment' => $environment];

        return $this->deleteRaw($path, $params, $requestOptions);
    }

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
    ): mixed {
        [$parsed, $options] = SourceCodeDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/source-code/%1$s/content/%2$s', $environment, $path],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Extract a zip file in the developer file system. Extraction status can be checked with the `/extract/async/tasks/taskId/status` endpoint below.
     *
     * @param string $path
     *
     * @throws APIException
     */
    public function extractAsync(
        $path,
        ?RequestOptions $requestOptions = null
    ): TaskLocator {
        $params = ['path' => $path];

        return $this->extractAsyncRaw($params, $requestOptions);
    }

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
    ): TaskLocator {
        [$parsed, $options] = SourceCodeExtractAsyncParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/source-code/extract/async',
            body: (object) $parsed,
            options: $options,
            convert: TaskLocator::class,
        );
    }

    /**
     * @api
     *
     * Downloads the byte contents of the file at the specified path in the specified environment.
     *
     * @param string $environment
     *
     * @throws APIException
     */
    public function get(
        string $path,
        $environment,
        ?RequestOptions $requestOptions = null
    ): string {
        $params = ['environment' => $environment];

        return $this->getRaw($path, $params, $requestOptions);
    }

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
    ): string {
        [$parsed, $options] = SourceCodeGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/source-code/%1$s/content/%2$s', $environment, $path],
            headers: ['Accept' => 'application/octet-stream'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Get the status of an extraction by the `taskId` returned from the initial `extract/async` request.
     *
     * @throws APIException
     */
    public function getExtractionStatus(
        int $taskID,
        ?RequestOptions $requestOptions = null
    ): ActionResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/source-code/extract/async/tasks/%1$s/status', $taskID],
            options: $requestOptions,
            convert: ActionResponse::class,
        );
    }

    /**
     * @api
     *
     * Gets the metadata object for the file at the specified path in the specified environment.
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
    ): AssetFileMetadata {
        $params = ['environment' => $environment, 'properties' => $properties];

        return $this->getMetadataRaw($path, $params, $requestOptions);
    }

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
    ): AssetFileMetadata {
        [$parsed, $options] = SourceCodeGetMetadataParams::parseRequest(
            $params,
            $requestOptions
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/source-code/%1$s/metadata/%2$s', $environment, $path],
            query: $parsed,
            options: $options,
            convert: AssetFileMetadata::class,
        );
    }

    /**
     * @api
     *
     * Upserts a file at the specified path in the specified environment. Accepts multipart/form-data content type.
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
    ): AssetFileMetadata {
        $params = ['environment' => $environment, 'file' => $file];

        return $this->upsertRaw($path, $params, $requestOptions);
    }

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
    ): AssetFileMetadata {
        [$parsed, $options] = SourceCodeUpsertParams::parseRequest(
            $params,
            $requestOptions
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['cms/v3/source-code/%1$s/content/%2$s', $environment, $path],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) array_diff_key($parsed, ['environment']),
            options: $options,
            convert: AssetFileMetadata::class,
        );
    }

    /**
     * @api
     *
     * Validates the file contents passed to the endpoint given a specified path and environment. Accepts multipart/form-data content type.
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
    ): string {
        $params = ['environment' => $environment, 'file' => $file];

        return $this->validateRaw($path, $params, $requestOptions);
    }

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
    ): string {
        [$parsed, $options] = SourceCodeValidateParams::parseRequest(
            $params,
            $requestOptions
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/source-code/%1$s/validate/%2$s', $environment, $path],
            headers: ['Content-Type' => 'multipart/form-data', 'Accept' => '*/*'],
            body: (object) array_diff_key($parsed, ['environment']),
            options: $options,
            convert: 'string',
        );
    }
}
