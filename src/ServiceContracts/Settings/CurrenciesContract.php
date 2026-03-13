<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Settings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\ToCurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams\CurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRate;
use HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest;
use HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest;

/**
 * @phpstan-import-type ExchangeRateCreateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type ExchangeRateUpdateRequestShape from \HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CurrenciesContract
{
    /**
     * @api
     *
     * @param list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchCreate(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchGet(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param list<ExchangeRateUpdateRequest|ExchangeRateUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchUpdate(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseExchangeRate;

    /**
     * @api
     *
     * @param float $conversionRate the conversion rate between the to and from currency code of this exchange rate
     * @param FromCurrencyCode|value-of<FromCurrencyCode> $fromCurrencyCode this represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert from
     * @param \DateTimeInterface $effectiveAt the date the exchange rate is in effect
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createExchangeRate(
        float $conversionRate,
        FromCurrencyCode|string $fromCurrencyCode,
        ?\DateTimeInterface $effectiveAt = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExchangeRate;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCompanyCurrency(
        RequestOptions|array|null $requestOptions = null
    ): CompanyCurrency;

    /**
     * @api
     *
     * @param string $exchangeRateID the ID of the exchange rate to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getExchangeRateByID(
        string $exchangeRateID,
        RequestOptions|array|null $requestOptions = null
    ): ExchangeRate;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCodes(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseCurrencyCodeInfoNoPaging;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCurrentExchangeRates(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseExchangeRateNoPaging;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param \HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\FromCurrencyCode|value-of<\HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\FromCurrencyCode> $fromCurrencyCode filters the response to only include exchange rates set from the specified currency
     * @param int $limit the maximum number of results to display per page
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode filters the response to only include exchange rates set to the specified currency
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ExchangeRate>
     *
     * @throws APIException
     */
    public function listExchangeRates(
        ?string $after = null,
        \HubspotSDK\Settings\Currencies\CurrencyListExchangeRatesParams\FromCurrencyCode|string|null $fromCurrencyCode = null,
        int $limit = 100,
        ToCurrencyCode|string|null $toCurrencyCode = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode The three-letter code representing a specific currency (ex. USD).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        CurrencyCode|string $currencyCode,
        RequestOptions|array|null $requestOptions = null,
    ): CompanyCurrency;

    /**
     * @api
     *
     * @param string $exchangeRateID the unique identifier of the exchange rate to be updated
     * @param float $conversionRate the updated conversion rate between the to and from currency code of this exchange rate
     * @param \DateTimeInterface $effectiveAt the date the exchange rate is in effect
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateExchangeRate(
        string $exchangeRateID,
        float $conversionRate,
        ?\DateTimeInterface $effectiveAt = null,
        RequestOptions|array|null $requestOptions = null,
    ): ExchangeRate;

    /**
     * @api
     *
     * @param \HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\FromCurrencyCode|value-of<\HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\FromCurrencyCode> $fromCurrencyCode this represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert from
     * @param \HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\ToCurrencyCode|value-of<\HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\ToCurrencyCode> $toCurrencyCode this represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert to
     * @param bool $visibleInUi This indicates if the currency pair is shown in the MultiCurrency settings page. Setting this to false will remove the currency pair from the settings page.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateVisibility(
        \HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\FromCurrencyCode|string $fromCurrencyCode,
        \HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\ToCurrencyCode|string $toCurrencyCode,
        bool $visibleInUi,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
