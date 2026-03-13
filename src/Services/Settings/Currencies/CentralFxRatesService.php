<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings\Currencies;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\Currencies\CentralFxRatesContract;
use HubspotSDK\Settings\Currencies\CentralExchangeRatesInformation;
use HubspotSDK\Settings\Currencies\CentralFxRates\CentralFxRateCreateCurrencyParams\CurrencyCode;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\ExchangeRate;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CentralFxRatesService implements CentralFxRatesContract
{
    /**
     * @api
     */
    public CentralFxRatesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CentralFxRatesRawService($client);
    }

    /**
     * @api
     *
     * Create a new currency with central exchange rates in the portal. Unsupported currencies cannot be added here.
     *
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode the currency code being added to the HubSpot portal for use with central exchange rates
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createCurrency(
        CurrencyCode|string $currencyCode,
        RequestOptions|array|null $requestOptions = null,
    ): ExchangeRate {
        $params = Util::removeNulls(['currencyCode' => $currencyCode]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createCurrency(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve details on whether the central exchange rates feature is enabled for the portal.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getInformation(
        RequestOptions|array|null $requestOptions = null
    ): CentralExchangeRatesInformation {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getInformation(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of currency codes that are not supported by the central exchange rates. Unsupported currencies will need to be manually updated.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getUnsupportedCurrencies(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseCurrencyCodeInfoNoPaging {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getUnsupportedCurrencies(requestOptions: $requestOptions);

        return $response->parse();
    }
}
