<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\SettingsContract;
use HubSpotSDK\Services\Settings\CurrenciesService;
use HubSpotSDK\Services\Settings\TaxRatesService;
use HubSpotSDK\Services\Settings\UsersService;

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
     * @api
     */
    public UsersService $users;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
        $this->currencies = new CurrenciesService($client);
        $this->taxRates = new TaxRatesService($client);
        $this->users = new UsersService($client);
    }
}
