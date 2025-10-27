<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings\Currencies;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Currencies\CentralExchangeRatesInformation;
use HubspotSDK\Settings\Currencies\CentralFxRates\CentralFxRateCreateCurrencyParams\CurrencyCode;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\ExchangeRate;

interface CentralFxRatesContract
{
    /**
     * @api
     *
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     *
     * @throws APIException
     */
    public function createCurrency(
        $currencyCode,
        ?RequestOptions $requestOptions = null
    ): ExchangeRate;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createCurrencyRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExchangeRate;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getInformation(
        ?RequestOptions $requestOptions = null
    ): CentralExchangeRatesInformation;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getUnsupportedCurrencies(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseCurrencyCodeInfoNoPaging;
}
