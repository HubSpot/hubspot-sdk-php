<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Extensions;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\Extensions\CallingContract;
use HubspotSDK\Services\CRM\Extensions\Calling\ChannelConnectionSettingsService;
use HubspotSDK\Services\CRM\Extensions\Calling\RecordingSettingsService;
use HubspotSDK\Services\CRM\Extensions\Calling\SettingsService;

final class CallingService implements CallingContract
{
    /**
     * @@api
     */
    public ChannelConnectionSettingsService $channelConnectionSettings;

    /**
     * @@api
     */
    public RecordingSettingsService $recordingSettings;

    /**
     * @@api
     */
    public SettingsService $settings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->channelConnectionSettings = new ChannelConnectionSettingsService($client);
        $this->recordingSettings = new RecordingSettingsService($client);
        $this->settings = new SettingsService($client);
    }
}
