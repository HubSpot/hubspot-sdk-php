<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CrmContract;
use HubspotSDK\Services\Crm\ObjectsService;

final class CrmService implements CrmContract
{
    /**
     * @api
     */
    public CrmRawService $raw;

    /**
     * @api
     */
    public ObjectsService $objects;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CrmRawService($client);
        $this->objects = new ObjectsService($client);
    }
}
