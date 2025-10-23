<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\BatchResponseBlogPost;
use HubspotSDK\Cms\Blogs\Posts\BlogPost;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface BatchContract
{
    /**
     * @api
     *
     * @param list<BlogPost> $inputs blog posts to input
     *
     * @throws APIException
     */
    public function create(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost;

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
    ): BatchResponseBlogPost;

    /**
     * @api
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
    ): BatchResponseBlogPost;

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
    ): BatchResponseBlogPost;

    /**
     * @api
     *
     * @param list<string> $inputs strings to input
     *
     * @throws APIException
     */
    public function delete(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed;

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
    ): mixed;

    /**
     * @api
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
    ): BatchResponseBlogPost;

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
    ): BatchResponseBlogPost;
}
