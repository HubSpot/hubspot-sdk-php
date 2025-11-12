<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\Batch\BatchCreateParams;
use HubspotSDK\Cms\Blogs\Posts\Batch\BatchDeleteParams;
use HubspotSDK\Cms\Blogs\Posts\Batch\BatchGetParams;
use HubspotSDK\Cms\Blogs\Posts\Batch\BatchUpdateParams;
use HubspotSDK\Cms\Blogs\Posts\BatchResponseBlogPost;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface BatchContract
{
    /**
     * @api
     *
     * @param array<mixed>|BatchCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost;

    /**
     * @api
     *
     * @param array<mixed>|BatchUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost;

    /**
     * @api
     *
     * @param array<mixed>|BatchDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|BatchGetParams $params
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseBlogPost;
}
