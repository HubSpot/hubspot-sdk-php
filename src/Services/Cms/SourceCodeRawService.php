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
     * Upload a content file to a specified environment and path in the HubSpot CMS. This endpoint allows you to add new content files to your HubSpot account by specifying the environment and path where the file should be stored. The request must include a file in binary format.
     *
     * @param string $path Path param: The specific path within the environment where the content file will be stored. This should be a valid path string.
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
     * Delete a specific content file from the specified environment in your HubSpot CMS. This operation is useful for removing outdated or unnecessary files from your source code repository. Ensure you have the necessary permissions to perform this action.
     *
     * @param string $path The specific path to the content file that you want to delete. This should be a valid path string.
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
     * Initiate an asynchronous extraction of source code files in the HubSpot CMS. This endpoint is useful for handling large file extractions without blocking the client application. Upon acceptance, it returns a task locator that can be used to check the status of the extraction process.
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
     * Retrieve content from the specified environment and path in your HubSpot CMS. This endpoint allows you to access specific content files based on the environment and path parameters, which can be useful for managing and displaying content in different environments.
     *
     * @param string $path The path to the content file within the specified environment. This should be a valid string that represents the location of the content file.
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
     * Retrieve the status of an asynchronous task related to source code extraction. This endpoint is useful for checking the progress or completion of a task initiated through the asynchronous file extraction process.
     *
     * @param int $taskID The unique identifier of the task whose status is being retrieved. It is an integer value.
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
     * Retrieve metadata for a specific file or folder within a specified environment in the HubSpot CMS. This endpoint is useful for obtaining detailed information about content files, such as their creation and update timestamps, and other metadata attributes.
     *
     * @param string $path path param: The path to the specific file or folder for which metadata is being retrieved
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
     * Update the content file in the specified environment and path within the HubSpot CMS. This operation allows you to upload a new file to replace the existing content at the given path. It is useful for managing and updating your website's source code files directly through the API.
     *
     * @param string $path Path param: The path to the content file that you want to update. This should be a string representing the file's location.
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
     * Validate a source code file within a specified environment in your HubSpot account. This endpoint is useful for checking the correctness of code files before deployment or further processing. The validation process requires the file to be uploaded in a multipart/form-data request.
     *
     * @param string $path Path param: The path of the source code file to validate. This should be a string that matches the file's location within the environment.
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
