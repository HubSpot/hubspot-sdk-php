<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings\Currencies;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Currencies\CentralExchangeRatesInformation;
use HubspotSDK\Settings\Currencies\CentralFxRates\CentralFxRateCreateCurrencyParams\CurrencyCode;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\ExchangeRate;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CentralFxRatesContract
{
    /**
     * @api
     *
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode the currency code being added to the HubSpot portal for use with central exchange rates
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createCurrency(
        CurrencyCode|string $currencyCode,
        RequestOptions|array|null $requestOptions = null,
    ): ExchangeRate;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getInformation(
        RequestOptions|array|null $requestOptions = null
    ): CentralExchangeRatesInformation;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getUnsupportedCurrencies(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseCurrencyCodeInfoNoPaging;
}
