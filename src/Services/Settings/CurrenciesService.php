<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Settings;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Settings\CurrenciesContract;
use HubSpotSDK\Services\Settings\Currencies\CentralFxRatesService;
use HubSpotSDK\Services\Settings\Currencies\ExchangeRatesService;
use HubSpotSDK\Settings\Currencies\CollectionResponseCurrencyCodeInfoNoPaging;
use HubSpotSDK\Settings\Currencies\CompanyCurrency;
use HubSpotSDK\Settings\Currencies\CurrencyUpdateCompanyCurrencyParams\CurrencyCode;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
     * @api
     */
    public ExchangeRatesService $exchangeRates;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CurrenciesRawService($client);
        $this->centralFxRates = new CentralFxRatesService($client);
        $this->exchangeRates = new ExchangeRatesService($client);
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
}
