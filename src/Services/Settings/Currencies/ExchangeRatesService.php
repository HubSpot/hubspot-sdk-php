<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Settings\Currencies;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Settings\Currencies\ExchangeRatesContract;
use HubSpotSDK\Services\Settings\Currencies\ExchangeRates\BatchService;
use HubSpotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubSpotSDK\Settings\Currencies\ExchangeRate;
use HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateCreateExchangeRateParams\FromCurrencyCode;
use HubSpotSDK\Settings\Currencies\ExchangeRates\ExchangeRateListExchangeRatesParams\ToCurrencyCode;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class ExchangeRatesService implements ExchangeRatesContract
{
    /**
     * @api
     */
    public ExchangeRatesRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ExchangeRatesRawService($client);
        $this->batch = new BatchService($client);
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
     * Retrieve the details for a specific exchange rate specified by its ID.
     *
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
     * Update an existing conversion rate, specified by its ID.
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
