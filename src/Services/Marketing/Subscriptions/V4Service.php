<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4Contract;
use HubspotSDK\Services\Marketing\Subscriptions\V4\DefinitionsService;
use HubspotSDK\Services\Marketing\Subscriptions\V4\LinksService;
use HubspotSDK\Services\Marketing\Subscriptions\V4\StatusesService;

final class V4Service implements V4Contract
{
    /**
     * @api
     */
    public V4RawService $raw;

    /**
     * @api
     */
    public DefinitionsService $definitions;

    /**
     * @api
     */
    public LinksService $links;

    /**
     * @api
     */
    public StatusesService $statuses;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new V4RawService($client);
        $this->definitions = new DefinitionsService($client);
        $this->links = new LinksService($client);
        $this->statuses = new StatusesService($client);
    }
}
