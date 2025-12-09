<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\AssociationsContract;
use HubspotSDK\Services\Crm\Associations\BatchService;
use HubspotSDK\Services\Crm\Associations\SchemaService;
use HubspotSDK\Services\Crm\Associations\V4Service;

final class AssociationsService implements AssociationsContract
{
    /**
     * @api
     */
    public AssociationsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @api
     */
    public SchemaService $schema;

    /**
     * @api
     */
    public V4Service $v4;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AssociationsRawService($client);
        $this->batch = new BatchService($client);
        $this->schema = new SchemaService($client);
        $this->v4 = new V4Service($client);
    }
}
