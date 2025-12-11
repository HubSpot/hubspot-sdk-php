<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\CurrenciesContract;
use HubspotSDK\Services\Settings\Currencies\CentralFxRatesService;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\ToCurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams\CurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRate;
use HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest\FromCurrencyCode;

final class CurrenciesService implements CurrenciesContract
{
    /**
     * @api
     */
    public CurrenciesRawService $raw;

    /**
     * @api
     */
    public CentralFxRatesService $centralFxRates;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CurrenciesRawService($client);
        $this->centralFxRates = new CentralFxRatesService($client);
    }

    /**
     * @api
     *
     * Create multiple exchange rates in a single request.
     *
     * @param list<array{
     *   conversionRate: float,
     *   fromCurrencyCode: 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XAG'|'XAU'|'XBA'|'XBB'|'XBC'|'XBD'|'XCD'|'XDR'|'XOF'|'XPD'|'XPF'|'XPT'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL'|FromCurrencyCode,
     *   effectiveAt?: string|\DateTimeInterface,
     * }> $inputs
     *
     * @throws APIException
     */
    public function batchCreate(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchCreate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details of multiple exchange rates in a single request, specified by their IDs.
     *
     * @param list<array{id: string}|PublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function batchGet(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchGet(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the conversion rates for multiple exchange rates in a batch operation.
     *
     * @param list<array{
     *   id: string, conversionRate: float, effectiveAt?: string|\DateTimeInterface
     * }> $inputs
     *
     * @throws APIException
     */
    public function batchUpdate(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchUpdate(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create a new exchange rate with specified conversion rate and currency codes.
     *
     * @param float $conversionRate the conversion rate between the to and from currency code of this exchange rate
     * @param 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XAG'|'XAU'|'XBA'|'XBB'|'XBC'|'XBD'|'XCD'|'XDR'|'XOF'|'XPD'|'XPF'|'XPT'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL'|\HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams\FromCurrencyCode $fromCurrencyCode this represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert from
     * @param string|\DateTimeInterface $effectiveAt the date the exchange rate is in effect
     *
     * @throws APIException
     */
    public function createExchangeRate(
        float $conversionRate,
        string|\HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams\FromCurrencyCode $fromCurrencyCode,
        string|\DateTimeInterface|null $effectiveAt = null,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate {
        $params = Util::removeNulls(
            [
                'conversionRate' => $conversionRate,
                'fromCurrencyCode' => $fromCurrencyCode,
                'effectiveAt' => $effectiveAt,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createExchangeRate(params: $params, requestOptions: $requestOptions);

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getCompanyCurrency(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details for a specific exchange rate specified by its ID.
     *
     * @param string $exchangeRateID the ID of the exchange rate to retrieve
     *
     * @throws APIException
     */
    public function getExchangeRateByID(
        string $exchangeRateID,
        ?RequestOptions $requestOptions = null
    ): ExchangeRate {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getExchangeRateByID($exchangeRateID, requestOptions: $requestOptions);

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listCodes(requestOptions: $requestOptions);

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listCurrentExchangeRates(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a list of exchange rates
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XAG'|'XAU'|'XBA'|'XBB'|'XBC'|'XBD'|'XCD'|'XDR'|'XOF'|'XPD'|'XPF'|'XPT'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL'|\HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\FromCurrencyCode $fromCurrencyCode filters the response to only include exchange rates set from the specified currency
     * @param int $limit the maximum number of results to display per page
     * @param 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XAG'|'XAU'|'XBA'|'XBB'|'XBC'|'XBD'|'XCD'|'XDR'|'XOF'|'XPD'|'XPF'|'XPT'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL'|ToCurrencyCode $toCurrencyCode filters the response to only include exchange rates set to the specified currency
     *
     * @return Page<ExchangeRate>
     *
     * @throws APIException
     */
    public function listExchangeRates(
        ?string $after = null,
        string|\HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\FromCurrencyCode|null $fromCurrencyCode = null,
        int $limit = 100,
        string|ToCurrencyCode|null $toCurrencyCode = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'after' => $after,
                'fromCurrencyCode' => $fromCurrencyCode,
                'limit' => $limit,
                'toCurrencyCode' => $toCurrencyCode,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listExchangeRates(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set or update the primary company currency.
     *
     * @param 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XAG'|'XAU'|'XBA'|'XBB'|'XBC'|'XBD'|'XCD'|'XDR'|'XOF'|'XPD'|'XPF'|'XPT'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL'|CurrencyCode $currencyCode The three-letter code representing a specific currency (ex. USD).
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        string|CurrencyCode $currencyCode,
        ?RequestOptions $requestOptions = null
    ): CompanyCurrency {
        $params = Util::removeNulls(['currencyCode' => $currencyCode]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateCompanyCurrency(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing conversion rate, specified by its ID.
     *
     * @param string $exchangeRateID the unique identifier of the exchange rate to be updated
     * @param float $conversionRate the updated conversion rate between the to and from currency code of this exchange rate
     * @param string|\DateTimeInterface $effectiveAt the date the exchange rate is in effect
     *
     * @throws APIException
     */
    public function updateExchangeRate(
        string $exchangeRateID,
        float $conversionRate,
        string|\DateTimeInterface|null $effectiveAt = null,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate {
        $params = Util::removeNulls(
            ['conversionRate' => $conversionRate, 'effectiveAt' => $effectiveAt]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateExchangeRate($exchangeRateID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Change the visibility setting for a currency pair. This will hide or display a currency pair for users in the HubSpot app.
     *
     * @param 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XAG'|'XAU'|'XBA'|'XBB'|'XBC'|'XBD'|'XCD'|'XDR'|'XOF'|'XPD'|'XPF'|'XPT'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL'|\HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\FromCurrencyCode $fromCurrencyCode this represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert from
     * @param 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XAG'|'XAU'|'XBA'|'XBB'|'XBC'|'XBD'|'XCD'|'XDR'|'XOF'|'XPD'|'XPF'|'XPT'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL'|\HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\ToCurrencyCode $toCurrencyCode this represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert to
     * @param bool $visibleInUi This indicates if the currency pair is shown in the MultiCurrency settings page. Setting this to false will remove the currency pair from the settings page.
     *
     * @throws APIException
     */
    public function updateVisibility(
        string|\HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\FromCurrencyCode $fromCurrencyCode,
        string|\HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\ToCurrencyCode $toCurrencyCode,
        bool $visibleInUi,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(
            [
                'fromCurrencyCode' => $fromCurrencyCode,
                'toCurrencyCode' => $toCurrencyCode,
                'visibleInUi' => $visibleInUi,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateVisibility(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
