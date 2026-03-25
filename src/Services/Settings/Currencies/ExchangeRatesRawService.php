<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings\Currencies;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\Currencies\ExchangeRatesRawContract;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\ExchangeRate;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateCreateExchangeRateParams;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateCreateExchangeRateParams\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams\ToCurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateExchangeRateParams;
use HubspotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ExchangeRatesRawService implements ExchangeRatesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   conversionRate: float,
     *   fromCurrencyCode: value-of<FromCurrencyCode>,
     *   effectiveAt?: \DateTimeInterface,
     * }|ExchangeRateCreateExchangeRateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function createExchangeRate(
        array|ExchangeRateCreateExchangeRateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExchangeRateCreateExchangeRateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/currencies/2026-03/exchange-rates',
            body: (object) $parsed,
            options: $options,
            convert: ExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function getExchangeRateByID(
        string $exchangeRateID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'settings/currencies/2026-03/exchange-rates/%1$s', $exchangeRateID,
            ],
            options: $requestOptions,
            convert: ExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseExchangeRateNoPaging>
     *
     * @throws APIException
     */
    public function listCurrentExchangeRates(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/currencies/2026-03/exchange-rates/current',
            options: $requestOptions,
            convert: CollectionResponseExchangeRateNoPaging::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   after?: string,
     *   fromCurrencyCode?: value-of<ExchangeRateListExchangeRatesParams\FromCurrencyCode>,
     *   limit?: int,
     *   toCurrencyCode?: value-of<ToCurrencyCode>,
     * }|ExchangeRateListExchangeRatesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExchangeRate>>
     *
     * @throws APIException
     */
    public function listExchangeRates(
        array|ExchangeRateListExchangeRatesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExchangeRateListExchangeRatesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/currencies/2026-03/exchange-rates',
            query: $parsed,
            options: $options,
            convert: ExchangeRate::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   conversionRate: float, effectiveAt?: \DateTimeInterface
     * }|ExchangeRateUpdateExchangeRateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function updateExchangeRate(
        string $exchangeRateID,
        array|ExchangeRateUpdateExchangeRateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExchangeRateUpdateExchangeRateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'settings/currencies/2026-03/exchange-rates/%1$s', $exchangeRateID,
            ],
            body: (object) $parsed,
            options: $options,
            convert: ExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * @param array{
     *   fromCurrencyCode: value-of<ExchangeRateUpdateVisibilityParams\FromCurrencyCode>,
     *   toCurrencyCode: value-of<ExchangeRateUpdateVisibilityParams\ToCurrencyCode>,
     *   visibleInUi: bool,
     * }|ExchangeRateUpdateVisibilityParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateVisibility(
        array|ExchangeRateUpdateVisibilityParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ExchangeRateUpdateVisibilityParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/currencies/2026-03/exchange-rates/update-visibility',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
