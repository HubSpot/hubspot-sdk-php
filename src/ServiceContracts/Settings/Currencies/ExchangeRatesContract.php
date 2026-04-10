<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Settings\Currencies;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubSpotSDK\Settings\Currencies\ExchangeRate;
use HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateCreateExchangeRateParams\FromCurrencyCode;
use HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams\ToCurrencyCode;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface ExchangeRatesContract
{
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
    public function listCurrentExchangeRates(
        RequestOptions|array|null $requestOptions = null
    ): CollectionResponseExchangeRateNoPaging;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param \HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams\FromCurrencyCode|value-of<\HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams\FromCurrencyCode> $fromCurrencyCode
     * @param int $limit the maximum number of results to display per page
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ExchangeRate>
     *
     * @throws APIException
     */
    public function listExchangeRates(
        ?string $after = null,
        \HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams\FromCurrencyCode|string|null $fromCurrencyCode = null,
        int $limit = 100,
        ToCurrencyCode|string|null $toCurrencyCode = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
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
     * @param \HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams\FromCurrencyCode|value-of<\HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams\FromCurrencyCode> $fromCurrencyCode this represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert from
     * @param \HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams\ToCurrencyCode|value-of<\HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams\ToCurrencyCode> $toCurrencyCode this represents the three-letter currency code (such as USD for US Dollar) of the currency you want to convert to
     * @param bool $visibleInUi This indicates if the currency pair is shown in the MultiCurrency settings page. Setting this to false will remove the currency pair from the settings page.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateVisibility(
        \HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams\FromCurrencyCode|string $fromCurrencyCode,
        \HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateUpdateVisibilityParams\ToCurrencyCode|string $toCurrencyCode,
        bool $visibleInUi,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
