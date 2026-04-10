<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\DealSplits;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\DealSplits\Batch\BatchReadParams;
use HubSpotSDK\Crm\DealSplits\Batch\BatchUpsertParams;
use HubSpotSDK\Crm\DealSplits\BatchResponseDealToDealSplits;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
