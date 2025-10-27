<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\ObjectLibraryContract;
use HubspotSDK\Services\CRM\ObjectLibrary\EnablementService;

final class ObjectLibraryService implements ObjectLibraryContract
{
    /**
     * @@api
     */
    public EnablementService $enablement;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->enablement = new EnablementService($client);
    }
}
