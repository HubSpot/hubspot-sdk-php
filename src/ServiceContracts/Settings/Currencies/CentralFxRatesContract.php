<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Settings\Currencies;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Settings\Currencies\CentralExchangeRatesInformation;
use HubSpotSDK\Settings\Currencies\CentralFxRates\CentralFxRateCreateCurrencyParams\CurrencyCode;
use HubSpotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubSpotSDK\Settings\Currencies\ExchangeRate;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
