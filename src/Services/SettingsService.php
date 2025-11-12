<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\SettingsContract;
use HubspotSDK\Services\Settings\CurrenciesService;
use HubspotSDK\Services\Settings\TaxRatesService;
use HubspotSDK\Services\Settings\UsersService;

final class SettingsService implements SettingsContract
{
    /**
     * @api
     */
    public CurrenciesService $currencies;

    /**
     * @api
     */
    public TaxRatesService $taxRates;

    /**
     * @api
     */
    public UsersService $users;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->currencies = new CurrenciesService($client);
        $this->taxRates = new TaxRatesService($client);
        $this->users = new UsersService($client);
    }
}
