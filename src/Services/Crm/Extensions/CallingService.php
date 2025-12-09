<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\Extensions\CallingContract;
use HubspotSDK\Services\Crm\Extensions\Calling\ChannelConnectionSettingsService;
use HubspotSDK\Services\Crm\Extensions\Calling\RecordingSettingsService;
use HubspotSDK\Services\Crm\Extensions\Calling\SettingsService;
use HubspotSDK\Services\Crm\Extensions\Calling\TranscriptsService;

final class CallingService implements CallingContract
{
    /**
     * @api
     */
    public CallingRawService $raw;

    /**
     * @api
     */
    public ChannelConnectionSettingsService $channelConnectionSettings;

    /**
     * @api
     */
    public RecordingSettingsService $recordingSettings;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @api
     */
    public TranscriptsService $transcripts;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CallingRawService($client);
        $this->channelConnectionSettings = new ChannelConnectionSettingsService($client);
        $this->recordingSettings = new RecordingSettingsService($client);
        $this->settings = new SettingsService($client);
        $this->transcripts = new TranscriptsService($client);
    }
}
