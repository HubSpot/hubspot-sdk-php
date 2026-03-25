<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\DataStudioContract;
use HubspotSDK\Services\DataStudio\DatasourceService;

final class DataStudioService implements DataStudioContract
{
    /**
     * @api
     */
    public DataStudioRawService $raw;

    /**
     * @api
     */
    public DatasourceService $datasource;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DataStudioRawService($client);
        $this->datasource = new DatasourceService($client);
    }
}
