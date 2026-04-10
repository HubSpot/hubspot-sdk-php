<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Blogs\Tags;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Blogs\Tags\Batch\BatchCreateBatchParams;
use HubSpotSDK\Cms\Blogs\Tags\Batch\BatchDeleteParams;
use HubSpotSDK\Cms\Blogs\Tags\Batch\BatchGetBatchParams;
use HubSpotSDK\Cms\Blogs\Tags\Batch\BatchUpdateBatchParams;
use HubSpotSDK\Cms\Blogs\Tags\Tag;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Blogs\Tags\BatchRawContract;

/**
 * @phpstan-import-type TagShape from \HubSpotSDK\Cms\Blogs\Tags\Tag
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Delete the Blog Tag objects identified in the request body.
     *
     * @param array{inputs: list<string>}|BatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/tags/batch/archive',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Create the Blog Tag objects detailed in the request body.
     *
     * @param array{inputs: list<Tag|TagShape>}|BatchCreateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function createBatch(
        array|BatchCreateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/tags/batch/create',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Retrieve the Blog Tag objects identified in the request body.
     *
     * @param array{inputs: list<string>, archived?: bool}|BatchGetBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getBatch(
        array|BatchGetBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/tags/batch/read',
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Update the Blog Tag objects identified in the request body.
     *
     * @param array{
     *   inputs: list<mixed>, archived?: bool
     * }|BatchUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|BatchUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/tags/batch/update',
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: 'string',
        );
    }
}
