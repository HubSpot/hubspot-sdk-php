<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\WebhooksContract;
use HubspotSDK\Services\Webhooks\SettingsService;
use HubspotSDK\Services\Webhooks\SubscriptionsService;

final class WebhooksService implements WebhooksContract
{
    /**
     * @@api
     */
    public SettingsService $settings;

    /**
     * @@api
     */
    public SubscriptionsService $subscriptions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->settings = new SettingsService($client);
        $this->subscriptions = new SubscriptionsService($client);
    }
}
