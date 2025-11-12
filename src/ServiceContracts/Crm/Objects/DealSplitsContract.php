<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\Crm\Objects\DealSplits\DealSplitBatchReadParams;
use HubspotSDK\Crm\Objects\DealSplits\DealSplitBatchUpsertParams;
use HubspotSDK\RequestOptions;

interface DealSplitsContract
{
    /**
     * @api
     *
     * @param array<mixed>|DealSplitBatchReadParams $params
     *
     * @throws APIException
     */
    public function batchRead(
        array|DealSplitBatchReadParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseDealToDealSplits;

    /**
     * @api
     *
     * @param array<mixed>|DealSplitBatchUpsertParams $params
     *
     * @throws APIException
     */
    public function batchUpsert(
        array|DealSplitBatchUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseDealToDealSplits;
}
