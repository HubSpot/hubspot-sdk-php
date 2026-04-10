<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Cms\Blogs\Tags;

use HubSpotSDK\Cms\Blogs\Tags\Batch\BatchCreateBatchParams;
use HubSpotSDK\Cms\Blogs\Tags\Batch\BatchDeleteParams;
use HubSpotSDK\Cms\Blogs\Tags\Batch\BatchGetBatchParams;
use HubSpotSDK\Cms\Blogs\Tags\Batch\BatchUpdateBatchParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        array|BatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchCreateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function createBatch(
        array|BatchCreateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getBatch(
        array|BatchGetBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|BatchUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
