<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\MarketingContract;
use HubspotSDK\Services\Marketing\EmailsService;
use HubspotSDK\Services\Marketing\FormsService;
use HubspotSDK\Services\Marketing\MarketingEventsService;
use HubspotSDK\Services\Marketing\SubscriptionsService;
use HubspotSDK\Services\Marketing\TransactionalService;

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
    public MarketingEventsService $marketingEvents;

    /**
     * @@api
     */
    public SubscriptionsService $subscriptions;

    /**
     * @@api
     */
    public TransactionalService $transactional;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->emails = new EmailsService($client);
        $this->forms = new FormsService($client);
        $this->marketingEvents = new MarketingEventsService($client);
        $this->subscriptions = new SubscriptionsService($client);
        $this->transactional = new TransactionalService($client);
    }
}
