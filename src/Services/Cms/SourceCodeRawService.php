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
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\SourceCodeRawContract;
use HubspotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class SourceCodeRawService implements SourceCodeRawContract
{
    // @phpstan-ignore-next-line
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
     * @param string $path Path param
     * @param array{environment: string, file?: string}|SourceCodeCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssetFileMetadata>
     *
     * @throws APIException
     */
    public function create(
        string $path,
        array|SourceCodeCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceCodeCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/source-code/2026-03/%1$s/content/%2$s', $environment, $path],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) array_diff_key($parsed, array_flip(['environment'])),
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $path,
        array|SourceCodeDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceCodeDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['cms/source-code/2026-03/%1$s/content/%2$s', $environment, $path],
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TaskLocator>
     *
     * @throws APIException
     */
    public function extractAsync(
        array|SourceCodeExtractAsyncParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceCodeExtractAsyncParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/source-code/2026-03/extract/async',
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function get(
        string $path,
        array|SourceCodeGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceCodeGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/source-code/2026-03/%1$s/content/%2$s', $environment, $path],
            headers: ['Accept' => '*/*'],
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Get the status of an extraction by the `taskId` returned from the initial `extract/async` request.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ActionResponse>
     *
     * @throws APIException
     */
    public function getExtractionStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'cms/source-code/2026-03/extract/async/tasks/%1$s/status', $taskID,
            ],
            options: $requestOptions,
            convert: ActionResponse::class,
        );
    }

    /**
     * @api
     *
     * Gets the metadata object for the file at the specified path in the specified environment.
     *
     * @param string $path Path param
     * @param array{
     *   environment: string, properties?: string
     * }|SourceCodeGetMetadataParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssetFileMetadata>
     *
     * @throws APIException
     */
    public function getMetadata(
        string $path,
        array|SourceCodeGetMetadataParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceCodeGetMetadataParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['cms/source-code/2026-03/%1$s/metadata/%2$s', $environment, $path],
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
     * @param string $path Path param
     * @param array{environment: string, file?: string}|SourceCodeUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssetFileMetadata>
     *
     * @throws APIException
     */
    public function upsert(
        string $path,
        array|SourceCodeUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceCodeUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['cms/source-code/2026-03/%1$s/content/%2$s', $environment, $path],
            headers: ['Content-Type' => 'multipart/form-data'],
            body: (object) array_diff_key($parsed, array_flip(['environment'])),
            options: $options,
            convert: AssetFileMetadata::class,
        );
    }

    /**
     * @api
     *
     * Validates the file contents passed to the endpoint given a specified path and environment. Accepts multipart/form-data content type.
     *
     * @param string $path Path param
     * @param array{
     *   environment: string, file?: string
     * }|SourceCodeValidateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function validate(
        string $path,
        array|SourceCodeValidateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SourceCodeValidateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $environment = $parsed['environment'];
        unset($parsed['environment']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['cms/source-code/2026-03/%1$s/validate/%2$s', $environment, $path],
            headers: ['Content-Type' => 'multipart/form-data', 'Accept' => '*/*'],
            body: (object) array_diff_key($parsed, array_flip(['environment'])),
            options: $options,
            convert: 'string',
        );
    }
}
