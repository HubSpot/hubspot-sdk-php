<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\TimelineContract;
use HubspotSDK\Services\CRM\Timeline\EventsService;
use HubspotSDK\Services\CRM\Timeline\TemplatesService;
use HubspotSDK\Services\CRM\Timeline\TokensService;

final class TimelineService implements TimelineContract
{
    /**
     * @@api
     */
    public EventsService $events;

    /**
     * @@api
     */
    public TemplatesService $templates;

    /**
     * @@api
     */
    public TokensService $tokens;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->events = new EventsService($client);
        $this->templates = new TemplatesService($client);
        $this->tokens = new TokensService($client);
    }
}
