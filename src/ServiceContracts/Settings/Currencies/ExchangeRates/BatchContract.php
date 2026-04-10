<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Settings\Currencies\ExchangeRates;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\PublicObjectID;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubSpotSDK\Settings\Currencies\ExchangeRateCreateRequest;
use HubSpotSDK\Settings\Currencies\ExchangeRateUpdateRequest;

/**
 * @phpstan-import-type ExchangeRateCreateRequestShape from \HubSpotSDK\Settings\Currencies\ExchangeRateCreateRequest
 * @phpstan-import-type ExchangeRateUpdateRequestShape from \HubSpotSDK\Settings\Currencies\ExchangeRateUpdateRequest
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param list<ExchangeRateUpdateRequest|ExchangeRateUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs An array of deal split inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseExchangeRate;
}
