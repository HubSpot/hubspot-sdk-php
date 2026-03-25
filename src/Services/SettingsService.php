<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\SettingsContract;
use HubspotSDK\Services\Settings\CurrenciesService;

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
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SettingsRawService($client);
        $this->currencies = new CurrenciesService($client);
    }
}
