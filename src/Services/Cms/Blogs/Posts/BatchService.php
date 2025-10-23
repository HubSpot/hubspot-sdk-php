<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs\Posts;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Posts\Batch\BatchCreateParams;
use HubspotSDK\Cms\Blogs\Posts\Batch\BatchDeleteParams;
use HubspotSDK\Cms\Blogs\Posts\Batch\BatchReadParams;
use HubspotSDK\Cms\Blogs\Posts\Batch\BatchUpdateParams;
use HubspotSDK\Cms\Blogs\Posts\BatchResponseBlogPost;
use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Cms\Blogs\Posts\BatchContract;

use const HubspotSDK\Core\OMIT as omit;

final class BatchService implements BatchContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a batch of blog posts, specifying their content in the request body.
     *
     * @param list<BlogPost> $inputs blog posts to input
     *
     * @throws APIException
     */
    public function create(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost {
        $params = ['inputs' => $inputs];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost {
        [$parsed, $options] = BatchCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseBlogPost::class,
        );
    }

    /**
     * @api
     *
     * Update a batch of blog posts.
     *
     * @param list<mixed> $inputs JSON nodes to input
     * @param bool $archived Specifies whether to update deleted Blog Posts. Defaults to `false`.
     *
     * @throws APIException
     */
    public function update(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost {
        $params = ['inputs' => $inputs, 'archived' => $archived];

        return $this->updateRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost {
        [$parsed, $options] = BatchUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts/batch/update',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseBlogPost::class,
        );
    }

    /**
     * @api
     *
     * Delete a blog post by ID.
     * Note: This is not the same as the in-app `archive` function. To perform a dashboard `archive` send an normal update with the `archivedInDashboard` field set to `true`.
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function delete(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['inputs' => $inputs];

        return $this->deleteRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts/batch/archive',
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
     * @param list<string> $inputs strings to input
     * @param bool $archived specifies whether to return deleted blog posts Defaults to `false`
     *
     * @throws APIException
     */
    public function read(
        $inputs,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost {
        $params = ['inputs' => $inputs, 'archived' => $archived];

        return $this->readRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost {
        [$parsed, $options] = BatchReadParams::parseRequest(
            $params,
            $requestOptions
        );
        $query_params = ['archived'];

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'cms/v3/blogs/posts/batch/read',
            query: array_diff_key($parsed, $query_params),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: BatchResponseBlogPost::class,
        );
    }
}
