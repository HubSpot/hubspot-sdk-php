<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\DealSplits;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\DealSplits\BatchResponseDealToDealSplits;
use HubSpotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest;
use HubSpotSDK\PublicObjectID;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 * @phpstan-import-type PublicDealSplitsCreateRequestShape from \HubSpotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
