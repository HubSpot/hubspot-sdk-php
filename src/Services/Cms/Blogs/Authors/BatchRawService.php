<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs\Authors;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Authors\Batch\BatchCreateParams;
use HubspotSDK\Cms\Blogs\Authors\Batch\BatchDeleteParams;
use HubspotSDK\Cms\Blogs\Authors\Batch\BatchGetParams;
use HubspotSDK\Cms\Blogs\Authors\Batch\BatchUpdateParams;
use HubspotSDK\Cms\Blogs\Authors\BlogAuthor;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\Authors\BatchRawContract;

/**
 * @phpstan-import-type BlogAuthorShape from \HubspotSDK\Cms\Blogs\Authors\BlogAuthor
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * @param array{inputs: list<BlogAuthor|BlogAuthorShape>}|BatchCreateParams $params
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
            path: 'cms/blogs/2026-03/authors/batch/create',
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
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
            path: 'cms/blogs/2026-03/authors/batch/update',
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
            path: 'cms/blogs/2026-03/authors/batch/archive',
            headers: ['Content-Type' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
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
            path: 'cms/blogs/2026-03/authors/batch/read',
            query: array_intersect_key($parsed, $query_params),
            headers: ['Content-Type' => '*/*', 'Accept' => '*/*'],
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: 'string',
        );
    }
}
