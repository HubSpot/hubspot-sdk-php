<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\TimelineContract;
use HubspotSDK\Services\Crm\Timeline\EventsService;
use HubspotSDK\Services\Crm\Timeline\TemplatesService;
use HubspotSDK\Services\Crm\Timeline\TokensService;

final class TimelineService implements TimelineContract
{
    /**
     * @api
     */
    public EventsService $events;

    /**
     * @api
     */
    public TemplatesService $templates;

    /**
     * @api
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
