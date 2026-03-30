<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings\Currencies;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\Currencies\CentralFxRatesRawContract;
use HubspotSDK\Settings\Currencies\CentralExchangeRatesInformation;
use HubspotSDK\Settings\Currencies\CentralFxRates\CentralFxRateCreateCurrencyParams;
use HubspotSDK\Settings\Currencies\CentralFxRates\CentralFxRateCreateCurrencyParams\CurrencyCode;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\ExchangeRate;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CentralFxRatesRawService implements CentralFxRatesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new currency with central exchange rates in the portal. Unsupported currencies cannot be added here.
     *
     * @param array{
     *   currencyCode: value-of<CurrencyCode>
     * }|CentralFxRateCreateCurrencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function createCurrency(
        array|CentralFxRateCreateCurrencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CentralFxRateCreateCurrencyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/currencies/2026-03/central-fx-rates/add-currency',
            body: (object) $parsed,
            options: $options,
            convert: ExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * Retrieve details on whether the central exchange rates feature is enabled for the portal.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CentralExchangeRatesInformation>
     *
     * @throws APIException
     */
    public function getInformation(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/currencies/2026-03/central-fx-rates/information',
            options: $requestOptions,
            convert: CentralExchangeRatesInformation::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of currency codes that are not supported by the central exchange rates. Unsupported currencies will need to be manually updated.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseCurrencyCodeInfoNoPaging>
     *
     * @throws APIException
     */
    public function getUnsupportedCurrencies(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/currencies/2026-03/central-fx-rates/unsupported-currencies',
            options: $requestOptions,
            convert: CollectionResponseCurrencyCodeInfoNoPaging::class,
        );
    }
}
