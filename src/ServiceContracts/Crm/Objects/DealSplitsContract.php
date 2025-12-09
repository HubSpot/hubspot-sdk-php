<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;

interface DealSplitsContract
{
    /**
     * @api
     *
     * @param list<array{id: string}|PublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function batchRead(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits;

    /**
     * @api
     *
     * @param list<array{
     *   id: int, splits: list<array{ownerID: int, percentage: float}>
     * }> $inputs
     *
     * @throws APIException
     */
    public function batchUpsert(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits;
}
