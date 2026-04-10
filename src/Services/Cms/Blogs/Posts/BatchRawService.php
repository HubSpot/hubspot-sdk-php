<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms\Blogs\Posts;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Blogs\Posts\Batch\BatchCreateParams;
use HubSpotSDK\Cms\Blogs\Posts\Batch\BatchDeleteParams;
use HubSpotSDK\Cms\Blogs\Posts\Batch\BatchGetParams;
use HubSpotSDK\Cms\Blogs\Posts\Batch\BatchUpdateParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Cms\Blogs\Posts\BatchRawContract;

/**
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
     * Create a batch of blog posts, specifying their content in the request body.
     *
     * @param array{inputs: list<mixed>}|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/posts/batch/create',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Update a batch of blog posts.
     *
     * @param array{inputs: list<mixed>, archived?: bool}|BatchUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/posts/batch/update',
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
     * Delete a blog post by ID.
     * Note: This is not the same as the in-app `archive` function. To perform a dashboard `archive` send an normal update with the `archivedInDashboard` field set to `true`.
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
            path: 'cms/blogs/2026-03/posts/batch/archive',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Retrieve a batch of blog posts by ID. identified in the request body.
     *
     * @param array{inputs: list<string>, archived?: bool}|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['archived']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'cms/blogs/2026-03/posts/batch/read',
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: 'string',
        );
    }
}
