<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencingContract;
use HubspotSDK\Services\Crm\Extensions\VideoConferencing\SettingsService;

final class VideoConferencingService implements VideoConferencingContract
{
    /**
     * @api
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
