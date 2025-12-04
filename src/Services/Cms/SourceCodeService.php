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
     * @param array{environment: string, file?: string}|SourceCodeCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $filePath,
        array|SourceCodeCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata {
        [$parsed, $options] = SourceCodeCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/source-code/%1$s/content/%2$s', $environment, $filePath],
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
     * @param array{environment: string}|SourceCodeDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $filePath,
        array|SourceCodeDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = SourceCodeDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['cms/v3/source-code/%1$s/content/%2$s', $environment, $filePath],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Extract a zip file in the developer file system. Extraction status can be checked with the `/extract/async/tasks/taskId/status` endpoint below.
     *
     * @param array{path: string}|SourceCodeExtractAsyncParams $params
     *
     * @throws APIException
     */
    public function extractAsync(
        array|SourceCodeExtractAsyncParams $params,
        ?RequestOptions $requestOptions = null,
    ): TaskLocator {
        [$parsed, $options] = SourceCodeExtractAsyncParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{environment: string}|SourceCodeGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $filePath,
        array|SourceCodeGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = SourceCodeGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/source-code/%1$s/content/%2$s', $environment, $filePath],
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
        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   environment: string, properties?: string
     * }|SourceCodeGetMetadataParams $params
     *
     * @throws APIException
     */
    public function getMetadata(
        string $filePath,
        array|SourceCodeGetMetadataParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata {
        [$parsed, $options] = SourceCodeGetMetadataParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/v3/source-code/%1$s/metadata/%2$s', $environment, $filePath],
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
     * @param array{environment: string, file?: string}|SourceCodeUpsertParams $params
     *
     * @throws APIException
     */
    public function upsert(
        string $filePath,
        array|SourceCodeUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssetFileMetadata {
        [$parsed, $options] = SourceCodeUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['cms/v3/source-code/%1$s/content/%2$s', $environment, $filePath],
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
     * @param array{
     *   environment: string, file?: string
     * }|SourceCodeValidateParams $params
     *
     * @throws APIException
     */
    public function validate(
        string $filePath,
        array|SourceCodeValidateParams $params,
        ?RequestOptions $requestOptions = null,
    ): string {
        [$parsed, $options] = SourceCodeValidateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/v3/source-code/%1$s/validate/%2$s', $environment, $filePath],
            headers: ['Content-Type' => 'multipart/form-data', 'Accept' => '*/*'],
            body: (object) array_diff_key($parsed, ['environment']),
            options: $options,
            convert: 'string',
        );
    }
}
