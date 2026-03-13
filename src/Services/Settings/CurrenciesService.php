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
     * @param list<ExchangeRateCreateRequest|ExchangeRateCreateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchCreate(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
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
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchGet(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
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
     * @param list<ExchangeRateUpdateRequest|ExchangeRateUpdateRequestShape> $inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function batchUpdate(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getCompanyCurrency(
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getExchangeRateByID(
        string $exchangeRateID,
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCodes(
        RequestOptions|array|null $requestOptions = null
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listCurrentExchangeRates(
        RequestOptions|array|null $requestOptions = null
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
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode The three-letter code representing a specific currency (ex. USD).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        CurrencyCode|string $currencyCode,
        RequestOptions|array|null $requestOptions = null,
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
