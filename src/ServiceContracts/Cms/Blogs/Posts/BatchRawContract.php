<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\Blogs\Posts;

use HubspotSDK\Cms\Blogs\Posts\Batch\BatchCreateParams;
use HubspotSDK\Cms\Blogs\Posts\Batch\BatchDeleteParams;
use HubspotSDK\Cms\Blogs\Posts\Batch\BatchGetParams;
use HubspotSDK\Cms\Blogs\Posts\Batch\BatchUpdateParams;
use HubspotSDK\Cms\Blogs\Posts\BatchResponseBlogPost;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|BatchCreateParams $params
     *
     * @return BaseResponse<BatchResponseBlogPost>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BatchUpdateParams $params
     *
     * @return BaseResponse<BatchResponseBlogPost>
     *
     * @throws APIException
     */
    public function update(
        array|BatchUpdateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BatchDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|BatchGetParams $params
     *
     * @return BaseResponse<BatchResponseBlogPost>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
