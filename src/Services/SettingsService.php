<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\SettingsContract;
use HubspotSDK\Services\Settings\CurrenciesService;
use HubspotSDK\Services\Settings\TaxRatesService;

final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public SettingsRawService $raw;

    /**
     * @api
     */
    public CurrenciesService $currencies;

    /**
     * @api
     */
    public TaxRatesService $taxRates;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
        $this->currencies = new CurrenciesService($client);
        $this->taxRates = new TaxRatesService($client);
    }
}
