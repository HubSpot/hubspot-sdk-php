<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\Extensions\VideoconferencingContract;
use HubspotSDK\Services\CRM\Extensions\Videoconferencing\SettingsService;

final class VideoconferencingService implements VideoconferencingContract
{
    /**
     * @@api
     */
    public SettingsService $settings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->settings = new SettingsService($client);
    }
}
