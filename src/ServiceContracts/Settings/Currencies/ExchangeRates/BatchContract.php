<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings\Currencies\ExchangeRates;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest;
use HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest;

/**
 * @phpstan-import-type ExchangeRateCreateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest
 * @phpstan-import-type ExchangeRateUpdateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseExchangeRate;
}
