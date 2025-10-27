<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Settings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Settings\CurrenciesContract;
use HubspotSDK\Services\Settings\Currencies\CentralFxRatesService;
use HubspotSDK\Settings\Currencies\BatchResponseExchangeRate;
use HubspotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateForwardPaging;
use HubspotSDK\Settings\Currencies\CollectionResponseExchangeRateNoPaging;
use HubspotSDK\Settings\Currencies\CompanyCurrency;
use HubspotSDK\Settings\Currencies\CurrencyBatchCreateParams;
use HubspotSDK\Settings\Currencies\CurrencyBatchGetParams;
use HubspotSDK\Settings\Currencies\CurrencyBatchUpdateParams;
use HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams;
use HubspotSDK\Settings\Currencies\CurrencyCreateExchangeRateParams\FromCurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams\CurrencyCode;
use HubspotSDK\Settings\Currencies\CurrencyUpdateExchangeRateParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams;
use HubspotSDK\Settings\Currencies\CurrencyUpdateVisibilityParams\ToCurrencyCode;
use HubspotSDK\Settings\Currencies\ExchangeRate;
use HubspotSDK\Settings\Currencies\ExchangeRateCreateRequest;
use HubspotSDK\Settings\Currencies\ExchangeRateUpdateRequest;

use const HubspotSDK\Core\OMIT as omit;

final class CurrenciesService implements CurrenciesContract
{
    /**
     * @@api
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
     * @param list<ExchangeRateCreateRequest> $inputs
     *
     * @throws APIException
     */
    public function batchCreate(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate {
        $params = ['inputs' => $inputs];

        return $this->batchCreateRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchCreateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate {
        [$parsed, $options] = CurrencyBatchCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param list<PublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function batchGet(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate {
        $params = ['inputs' => $inputs];

        return $this->batchGetRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchGetRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate {
        [$parsed, $options] = CurrencyBatchGetParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param list<ExchangeRateUpdateRequest> $inputs
     *
     * @throws APIException
     */
    public function batchUpdate(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate {
        $params = ['inputs' => $inputs];

        return $this->batchUpdateRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUpdateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseExchangeRate {
        [$parsed, $options] = CurrencyBatchUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param float $conversionRate
     * @param FromCurrencyCode|value-of<FromCurrencyCode> $fromCurrencyCode
     * @param \DateTimeInterface $effectiveAt
     *
     * @throws APIException
     */
    public function createExchangeRate(
        $conversionRate,
        $fromCurrencyCode,
        $effectiveAt = omit,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate {
        $params = [
            'conversionRate' => $conversionRate,
            'fromCurrencyCode' => $fromCurrencyCode,
            'effectiveAt' => $effectiveAt,
        ];

        return $this->createExchangeRateRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createExchangeRateRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): ExchangeRate {
        [$parsed, $options] = CurrencyCreateExchangeRateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function getCompanyCurrency(
        ?RequestOptions $requestOptions = null
    ): CompanyCurrency {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function getExchangeRateByID(
        string $exchangeRateID,
        ?RequestOptions $requestOptions = null
    ): ExchangeRate {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function listCodes(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseCurrencyCodeInfoNoPaging {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function listCurrentExchangeRates(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseExchangeRateNoPaging {
        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function listExchangeRates(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseExchangeRateForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'settings/v3/currencies/exchange-rates',
            options: $requestOptions,
            convert: CollectionResponseExchangeRateForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Set or update the primary company currency.
     *
     * @param CurrencyCode|value-of<CurrencyCode> $currencyCode
     *
     * @throws APIException
     */
    public function updateCompanyCurrency(
        $currencyCode,
        ?RequestOptions $requestOptions = null
    ): CompanyCurrency {
        $params = ['currencyCode' => $currencyCode];

        return $this->updateCompanyCurrencyRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateCompanyCurrencyRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CompanyCurrency {
        [$parsed, $options] = CurrencyUpdateCompanyCurrencyParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param float $conversionRate
     * @param \DateTimeInterface $effectiveAt
     *
     * @throws APIException
     */
    public function updateExchangeRate(
        string $exchangeRateID,
        $conversionRate,
        $effectiveAt = omit,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate {
        $params = [
            'conversionRate' => $conversionRate, 'effectiveAt' => $effectiveAt,
        ];

        return $this->updateExchangeRateRaw(
            $exchangeRateID,
            $params,
            $requestOptions
        );
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateExchangeRateRaw(
        string $exchangeRateID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ExchangeRate {
        [$parsed, $options] = CurrencyUpdateExchangeRateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param CurrencyUpdateVisibilityParams\FromCurrencyCode|value-of<CurrencyUpdateVisibilityParams\FromCurrencyCode> $fromCurrencyCode
     * @param ToCurrencyCode|value-of<ToCurrencyCode> $toCurrencyCode
     * @param bool $visibleInUi
     *
     * @throws APIException
     */
    public function updateVisibility(
        $fromCurrencyCode,
        $toCurrencyCode,
        $visibleInUi,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'fromCurrencyCode' => $fromCurrencyCode,
            'toCurrencyCode' => $toCurrencyCode,
            'visibleInUi' => $visibleInUi,
        ];

        return $this->updateVisibilityRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateVisibilityRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = CurrencyUpdateVisibilityParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'settings/v3/currencies/exchange-rates/update-visibility',
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
