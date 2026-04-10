<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\EventsContract;
use HubSpotSDK\Services\Events\DefinitionsService;
use HubSpotSDK\Services\Events\OccurrencesService;
use HubSpotSDK\Services\Events\SendService;

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
