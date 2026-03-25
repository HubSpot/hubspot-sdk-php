<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\EventsContract;
use HubspotSDK\Services\Events\DefinitionsService;
use HubspotSDK\Services\Events\OccurrencesService;
use HubspotSDK\Services\Events\SendService;

final class EventsService implements EventsContract
{
    /**
     * @api
     */
    public EventsRawService $raw;

    /**
     * @api
     */
    public DefinitionsService $definitions;

    /**
     * @api
     */
    public OccurrencesService $occurrences;

    /**
     * @api
     */
    public SendService $send;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EventsRawService($client);
        $this->definitions = new DefinitionsService($client);
        $this->occurrences = new OccurrencesService($client);
        $this->send = new SendService($client);
    }
}
