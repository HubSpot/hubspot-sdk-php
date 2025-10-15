<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb\Rows;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\Hubdb\Rows\DraftContract;
use HubspotSDK\Services\Cms\Hubdb\Rows\Draft\BatchService;

final class DraftService implements DraftContract
{
    /**
     * @@api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->batch = new BatchService($client);
    }
}
