<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\Crm\Objects\DealSplits\DealSplitBatchReadParams;
use HubspotSDK\Crm\Objects\DealSplits\DealSplitBatchUpsertParams;
use HubspotSDK\RequestOptions;

interface DealSplitsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|DealSplitBatchReadParams $params
     *
     * @return BaseResponse<BatchResponseDealToDealSplits>
     *
     * @throws APIException
     */
    public function batchRead(
        array|DealSplitBatchReadParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|DealSplitBatchUpsertParams $params
     *
     * @return BaseResponse<BatchResponseDealToDealSplits>
     *
     * @throws APIException
     */
    public function batchUpsert(
        array|DealSplitBatchUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
