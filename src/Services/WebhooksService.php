<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\WebhooksContract;
use HubspotSDK\Services\Webhooks\WebhookSubscriptionsService;

final class WebhooksService implements WebhooksContract
{
    /**
     * @api
     */
    public WebhooksRawService $raw;

    /**
     * @api
     */
    public WebhookSubscriptionsService $webhookSubscriptions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WebhooksRawService($client);
        $this->webhookSubscriptions = new WebhookSubscriptionsService($client);
    }
}
