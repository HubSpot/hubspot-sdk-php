<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\CurrenciesRawContract;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\CurrencyBatchCreateParams;
use HubspotSDK\Settings\Currencies\CurrencyBatchGetParams;
use HubspotSDK\Settings\Currencies\CurrencyBatchUpdateParams;
use HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams;
use HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams;
use HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\ToCurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams\CurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateExchangeRateParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams;
use HubspotSDK\Settings\Currencies\ExchangeRate;
use HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest;
use HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest;

/**
 * @phpstan-import-type ExchangeRateCreateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type ExchangeRateUpdateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class CurrenciesRawService implements CurrenciesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create multiple exchange rates in a single request.
     *
     * @param array{
     *   inputs: list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape>
     * }|CurrencyBatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseExchangeRate>
     *
     * @throws APIException
     */
    public function batchCreate(
        array|CurrencyBatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CurrencyBatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the details of multiple exchange rates in a single request, specified by their IDs.
     *
     * @param array{
     *   inputs: list<PublicObjectID|PublicObjectIDShape>
     * }|CurrencyBatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseExchangeRate>
     *
     * @throws APIException
     */
    public function batchGet(
        array|CurrencyBatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CurrencyBatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates/batch/read',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * Update the conversion rates for multiple exchange rates in a batch operation.
     *
     * @param array{
     *   inputs: list<ExchangeRateUpdateRequest|ExchangeRateUpdateRequestShape>
     * }|CurrencyBatchUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseExchangeRate>
     *
     * @throws APIException
     */
    public function batchUpdate(
        array|CurrencyBatchUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CurrencyBatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * Create a new exchange rate with specified conversion rate and currency codes.
     *
     * @param array{
     *   conversionRate: float,
     *   fromCurrencyCode: value-of<FromCurrencyCode>,
     *   effectiveAt?: \DateTimeInterface,
     * }|CurrencyCreateExchangeRateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function createExchangeRate(
        array|CurrencyCreateExchangeRateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CurrencyCreateExchangeRateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates',
            body: (object) $parsed,
            options: $options,
            convert: ExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * Get the details for the company currency. The company currency is used in deal totals, reports, and the default currency for new deals.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompanyCurrency>
     *
     * @throws APIException
     */
    public function getCompanyCurrency(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/v3/currencies/company-currency',
            options: $requestOptions,
            convert: CompanyCurrency::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the details for a specific exchange rate specified by its ID.
     *
     * @param string $exchangeRateID the ID of the exchange rate to retrieve
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
            path: ['settings/v3/currencies/exchange-rates/%1$s', $exchangeRateID],
            options: $requestOptions,
            convert: ExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of all available currency codes and their names.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseCurrencyCodeInfoNoPaging>
     *
     * @throws APIException
     */
    public function listCodes(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/v3/currencies/codes',
            options: $requestOptions,
            convert: CollectionResponseCurrencyCodeInfoNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Retrieve all current exchange rates for all currency pairs.
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
            path: 'settings/v3/currencies/exchange-rates/current',
            options: $requestOptions,
            convert: CollectionResponseExchangeRateNoPaging::class,
        );
    }

    /**
     * @api
     *
     * Get a list of exchange rates
     *
     * @param array{
     *   after?: string,
     *   fromCurrencyCode?: value-of<CurrencyListExchangeRatesParams\FromCurrencyCode>,
     *   limit?: int,
     *   toCurrencyCode?: value-of<ToCurrencyCode>,
     * }|CurrencyListExchangeRatesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExchangeRate>>
     *
     * @throws APIException
     */
    public function listExchangeRates(
        array|CurrencyListExchangeRatesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CurrencyListExchangeRatesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'settings/v3/currencies/exchange-rates',
            query: $parsed,
            options: $options,
            convert: ExchangeRate::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Set or update the primary company currency.
     *
     * @param array{
     *   currencyCode: value-of<CurrencyCode>
     * }|CurrencyUpdateCompanyCurrencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompanyCurrency>
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        array|CurrencyUpdateCompanyCurrencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CurrencyUpdateCompanyCurrencyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: 'settings/v3/currencies/company-currency',
            body: (object) $parsed,
            options: $options,
            convert: CompanyCurrency::class,
        );
    }

    /**
     * @api
     *
     * Update an existing conversion rate, specified by its ID.
     *
     * @param string $exchangeRateID the unique identifier of the exchange rate to be updated
     * @param array{
     *   conversionRate: float, effectiveAt?: \DateTimeInterface
     * }|CurrencyUpdateExchangeRateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ExchangeRate>
     *
     * @throws APIException
     */
    public function updateExchangeRate(
        string $exchangeRateID,
        array|CurrencyUpdateExchangeRateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CurrencyUpdateExchangeRateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['settings/v3/currencies/exchange-rates/%1$s', $exchangeRateID],
            body: (object) $parsed,
            options: $options,
            convert: ExchangeRate::class,
        );
    }

    /**
     * @api
     *
     * Change the visibility setting for a currency pair. This will hide or display a currency pair for users in the HubSpot app.
     *
     * @param array{
     *   fromCurrencyCode: value-of<CurrencyUpdateVisibilityParams\FromCurrencyCode>,
     *   toCurrencyCode: value-of<CurrencyUpdateVisibilityParams\ToCurrencyCode>,
     *   visibleInUi: bool,
     * }|CurrencyUpdateVisibilityParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateVisibility(
        array|CurrencyUpdateVisibilityParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CurrencyUpdateVisibilityParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates/update-visibility',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
