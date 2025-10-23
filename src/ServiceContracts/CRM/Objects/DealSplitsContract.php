<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\CRM\Objects\DealSplits\PublicDealSplitsCreateRequest;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;

interface DealSplitsContract
{
    /**
     * @api
     *
     * @param list<PublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function batchRead(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchReadRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits;

    /**
     * @api
     *
     * @param list<PublicDealSplitsCreateRequest> $inputs
     *
     * @throws APIException
     */
    public function batchUpsert(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUpsertRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits;
}
