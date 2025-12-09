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
     * @param 'AED'|'AFN'|'ALL'|'AMD'|'ANG'|'AOA'|'ARS'|'AUD'|'AWG'|'AZN'|'BAM'|'BBD'|'BDT'|'BGN'|'BHD'|'BIF'|'BMD'|'BND'|'BOB'|'BOV'|'BRL'|'BSD'|'BTN'|'BWP'|'BYN'|'BZD'|'CAD'|'CDF'|'CHE'|'CHF'|'CHW'|'CLF'|'CLP'|'CNY'|'COP'|'COU'|'CRC'|'CUC'|'CUP'|'CVE'|'CZK'|'DJF'|'DKK'|'DOP'|'DZD'|'EGP'|'ERN'|'ETB'|'EUR'|'FJD'|'FKP'|'GBP'|'GEL'|'GHS'|'GIP'|'GMD'|'GNF'|'GTQ'|'GYD'|'HKD'|'HNL'|'HRK'|'HTG'|'HUF'|'IDR'|'ILS'|'INR'|'IQD'|'IRR'|'ISK'|'JMD'|'JOD'|'JPY'|'KES'|'KGS'|'KHR'|'KMF'|'KPW'|'KRW'|'KWD'|'KYD'|'KZT'|'LAK'|'LBP'|'LKR'|'LRD'|'LSL'|'LYD'|'MAD'|'MDL'|'MGA'|'MKD'|'MMK'|'MNT'|'MOP'|'MRU'|'MUR'|'MVR'|'MWK'|'MXN'|'MXV'|'MYR'|'MZN'|'NAD'|'NGN'|'NIO'|'NOK'|'NPR'|'NZD'|'OMR'|'PAB'|'PEN'|'PGK'|'PHP'|'PKR'|'PLN'|'PYG'|'QAR'|'RON'|'RSD'|'RUB'|'RWF'|'SAR'|'SBD'|'SCR'|'SDG'|'SEK'|'SGD'|'SHP'|'SLL'|'SOS'|'SRD'|'SSP'|'STN'|'SVC'|'SYP'|'SZL'|'THB'|'TJS'|'TMT'|'TND'|'TOP'|'TRY'|'TTD'|'TWD'|'TZS'|'UAH'|'UGX'|'USD'|'USN'|'UYI'|'UYU'|'UZS'|'VEF'|'VND'|'VUV'|'WST'|'XAF'|'XAG'|'XAU'|'XBA'|'XBB'|'XBC'|'XBD'|'XCD'|'XDR'|'XOF'|'XPD'|'XPF'|'XPT'|'XSU'|'XUA'|'YER'|'ZAR'|'ZMW'|'ZWL'|CurrencyCode $currencyCode the currency code being added to the HubSpot portal for use with central exchange rates
     *
     * @throws APIException
     */
    public function createCurrency(
        string|CurrencyCode $currencyCode,
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
