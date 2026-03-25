<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CommunicationPreferences;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CommunicationPreferences\StatusesContract;
use HubspotSDK\Services\CommunicationPreferences\Statuses\BatchService;

final class StatusesService implements StatusesContract
{
    /**
     * @api
     */
    public StatusesRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StatusesRawService($client);
        $this->batch = new BatchService($client);
    }
}
