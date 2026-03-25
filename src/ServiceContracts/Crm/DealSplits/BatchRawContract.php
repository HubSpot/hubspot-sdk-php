<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\DealSplits;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\DealSplits\Batch\BatchReadParams;
use HubspotSDK\Crm\DealSplits\Batch\BatchUpsertParams;
use HubspotSDK\Crm\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchReadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseDealToDealSplits>
     *
     * @throws APIException
     */
    public function read(
        array|BatchReadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseDealToDealSplits>
     *
     * @throws APIException
     */
    public function upsert(
        array|BatchUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
