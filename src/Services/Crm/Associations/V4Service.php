<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\Associations\V4Contract;
use HubspotSDK\Services\Crm\Associations\V4\BatchService;
use HubspotSDK\Services\Crm\Associations\V4\ReportService;

final class V4Service implements V4Contract
{
    /**
     * @api
     */
    public V4RawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @api
     */
    public ReportService $report;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new V4RawService($client);
        $this->batch = new BatchService($client);
        $this->report = new ReportService($client);
    }
}
