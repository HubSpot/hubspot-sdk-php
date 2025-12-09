<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\ObjectLibraryContract;
use HubspotSDK\Services\Crm\ObjectLibrary\EnablementService;

final class ObjectLibraryService implements ObjectLibraryContract
{
    /**
     * @api
     */
    public ObjectLibraryRawService $raw;

    /**
     * @api
     */
    public EnablementService $enablement;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ObjectLibraryRawService($client);
        $this->enablement = new EnablementService($client);
    }
}
