<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Crm\DealSplitsContract;
use HubSpotSDK\Services\Crm\DealSplits\BatchService;

final class DealSplitsService implements DealSplitsContract
{
    /**
     * @api
     */
    public DealSplitsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DealSplitsRawService($client);
        $this->batch = new BatchService($client);
    }
}
