<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\MarketingContract;
use HubspotSDK\Services\Marketing\EmailsService;
use HubspotSDK\Services\Marketing\FormsService;
use HubspotSDK\Services\Marketing\SubscriptionsService;

final class MarketingService implements MarketingContract
{
    /**
     * @@api
     */
    public EmailsService $emails;

    /**
     * @@api
     */
    public FormsService $forms;

    /**
     * @@api
     */
    public SubscriptionsService $subscriptions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->emails = new EmailsService($client);
        $this->forms = new FormsService($client);
        $this->subscriptions = new SubscriptionsService($client);
    }
}
