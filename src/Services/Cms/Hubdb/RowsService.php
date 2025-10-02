<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\Hubdb\RowsContract;
use HubspotSDK\Services\Cms\Hubdb\Rows\BatchService;

final class RowsService implements RowsContract
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
