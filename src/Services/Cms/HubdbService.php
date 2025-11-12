<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\HubdbContract;
use HubspotSDK\Services\Cms\Hubdb\RowsService;
use HubspotSDK\Services\Cms\Hubdb\TablesService;

final class HubdbService implements HubdbContract
{
    /**
     * @api
     */
    public RowsService $rows;

    /**
     * @api
     */
    public TablesService $tables;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->rows = new RowsService($client);
        $this->tables = new TablesService($client);
    }
}
