<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\DealSplits;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type PublicDealSplitsCreateRequestShape from \HubspotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs An array of deal split inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function read(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseDealToDealSplits;

    /**
     * @api
     *
     * @param list<PublicDealSplitsCreateRequest|PublicDealSplitsCreateRequestShape> $inputs An array of deal split inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsert(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseDealToDealSplits;
}
