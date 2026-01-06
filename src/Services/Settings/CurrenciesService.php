<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\CurrenciesContract;
use HubspotSDK\Services\Settings\Currencies\CentralFxRatesService;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\CurrencyBatchCreateParams;
use HubspotSDK\Settings\Currencies\CurrencyBatchGetParams;
use HubspotSDK\Settings\Currencies\CurrencyBatchUpdateParams;
use HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams;
use HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams;
use HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\ToCurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams\CurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateExchangeRateParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams;
use HubspotSDK\Settings\Currencies\ExchangeRate;
use HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest\FromCurrencyCode;

final class CurrenciesService implements CurrenciesContract
{
    /**
     * @api
     */
    public CentralFxRatesService $centralFxRates;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->centralFxRates = new CentralFxRatesService($client);
    }

    /**
     * @api
     *
     * Create multiple exchange rates in a single request.
     *
     * @param array{
     *   inputs: list<array{
     *     conversionRate: float,
     *     fromCurrencyCode: 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XAG'|'XAU'|'XBA'|'XBB'|'XBC'|'XBD'|'XCD'|'XDR'|'XOF'|'XPD'|'XPF'|'XPT'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL'|FromCurrencyCode,
     *     effectiveAt?: string|\DateTimeInterface,
     *   }>,
     * }|CurrencyBatchCreateParams $params
     *
     * @throws APIException
     */
    public function batchCreate(
        array|CurrencyBatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseExchangeRate {
        [$parsed, $options] = CurrencyBatchCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseExchangeRate> */
        $response = $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates/batch/create',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseExchangeRate::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details of multiple exchange rates in a single request, specified by their IDs.
     *
     * @param array{
     *   inputs: list<array{id: string}|PublicObjectID>
     * }|CurrencyBatchGetParams $params
     *
     * @throws APIException
     */
    public function batchGet(
        array|CurrencyBatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate {
        [$parsed, $options] = CurrencyBatchGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseExchangeRate> */
        $response = $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates/batch/read',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseExchangeRate::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the conversion rates for multiple exchange rates in a batch operation.
     *
     * @param array{
     *   inputs: list<array{
     *     id: string, conversionRate: float, effectiveAt?: string|\DateTimeInterface
     *   }>,
     * }|CurrencyBatchUpdateParams $params
     *
     * @throws APIException
     */
    public function batchUpdate(
        array|CurrencyBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseExchangeRate {
        [$parsed, $options] = CurrencyBatchUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<BatchResponseExchangeRate> */
        $response = $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseExchangeRate::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new exchange rate with specified conversion rate and currency codes.
     *
     * @param array{
     *   conversionRate: float,
     *   fromCurrencyCode: value-of<CurrencyCreateExchangeRateParams\FromCurrencyCode>,
     *   effectiveAt?: string|\DateTimeInterface,
     * }|CurrencyCreateExchangeRateParams $params
     *
     * @throws APIException
     */
    public function createExchangeRate(
        array|CurrencyCreateExchangeRateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate {
        [$parsed, $options] = CurrencyCreateExchangeRateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ExchangeRate> */
        $response = $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates',
            body: (object) $parsed,
            options: $options,
            convert: ExchangeRate::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details for the company currency. The company currency is used in deal totals, reports, and the default currency for new deals.
     *
     * @throws APIException
     */
    public function getCompanyCurrency(
        ?RequestOptions $requestOptions = null
    ): CompanyCurrency {
        /** @var BaseResponse<CompanyCurrency> */
        $response = $this->client->request(
            method: 'get',
            path: 'settings/v3/currencies/company-currency',
            options: $requestOptions,
            convert: CompanyCurrency::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details for a specific exchange rate specified by its ID.
     *
     * @throws APIException
     */
    public function getExchangeRateByID(
        string $exchangeRateID,
        ?RequestOptions $requestOptions = null
    ): ExchangeRate {
        /** @var BaseResponse<ExchangeRate> */
        $response = $this->client->request(
            method: 'get',
            path: ['settings/v3/currencies/exchange-rates/%1$s', $exchangeRateID],
            options: $requestOptions,
            convert: ExchangeRate::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of all available currency codes and their names.
     *
     * @throws APIException
     */
    public function listCodes(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseCurrencyCodeInfoNoPaging {
        /** @var BaseResponse<CollectionResponseCurrencyCodeInfoNoPaging> */
        $response = $this->client->request(
            method: 'get',
            path: 'settings/v3/currencies/codes',
            options: $requestOptions,
            convert: CollectionResponseCurrencyCodeInfoNoPaging::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve all current exchange rates for all currency pairs.
     *
     * @throws APIException
     */
    public function listCurrentExchangeRates(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseExchangeRateNoPaging {
        /** @var BaseResponse<CollectionResponseExchangeRateNoPaging> */
        $response = $this->client->request(
            method: 'get',
            path: 'settings/v3/currencies/exchange-rates/current',
            options: $requestOptions,
            convert: CollectionResponseExchangeRateNoPaging::class,
        );

        return $response->parse();
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
     *
     * @return Page<ExchangeRate>
     *
     * @throws APIException
     */
    public function listExchangeRates(
        array|CurrencyListExchangeRatesParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = CurrencyListExchangeRatesParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<ExchangeRate>> */
        $response = $this->client->request(
            method: 'get',
            path: 'settings/v3/currencies/exchange-rates',
            query: $parsed,
            options: $options,
            convert: ExchangeRate::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Set or update the primary company currency.
     *
     * @param array{
     *   currencyCode: value-of<CurrencyCode>
     * }|CurrencyUpdateCompanyCurrencyParams $params
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        array|CurrencyUpdateCompanyCurrencyParams $params,
        ?RequestOptions $requestOptions = null,
    ): CompanyCurrency {
        [$parsed, $options] = CurrencyUpdateCompanyCurrencyParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<CompanyCurrency> */
        $response = $this->client->request(
            method: 'put',
            path: 'settings/v3/currencies/company-currency',
            body: (object) $parsed,
            options: $options,
            convert: CompanyCurrency::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing conversion rate, specified by its ID.
     *
     * @param array{
     *   conversionRate: float, effectiveAt?: string|\DateTimeInterface
     * }|CurrencyUpdateExchangeRateParams $params
     *
     * @throws APIException
     */
    public function updateExchangeRate(
        string $exchangeRateID,
        array|CurrencyUpdateExchangeRateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate {
        [$parsed, $options] = CurrencyUpdateExchangeRateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ExchangeRate> */
        $response = $this->client->request(
            method: 'patch',
            path: ['settings/v3/currencies/exchange-rates/%1$s', $exchangeRateID],
            body: (object) $parsed,
            options: $options,
            convert: ExchangeRate::class,
        );

        return $response->parse();
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
     *
     * @throws APIException
     */
    public function updateVisibility(
        array|CurrencyUpdateVisibilityParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = CurrencyUpdateVisibilityParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates/update-visibility',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );

        return $response->parse();
    }
}
