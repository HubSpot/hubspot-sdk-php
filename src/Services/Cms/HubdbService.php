<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Cms\HubdbContract;
use HubSpotSDK\Services\Cms\Hubdb\RowsService;
use HubSpotSDK\Services\Cms\Hubdb\TablesService;

final class HubdbService implements HubdbContract
{
    /**
     * @api
     */
    public HubdbRawService $raw;

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
        $this->raw = new HubdbRawService($client);
        $this->rows = new RowsService($client);
        $this->tables = new TablesService($client);
    }
}
