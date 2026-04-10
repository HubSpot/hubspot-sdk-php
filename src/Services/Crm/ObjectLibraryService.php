<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Crm\ObjectLibraryContract;
use HubSpotSDK\Services\Crm\ObjectLibrary\EnablementService;

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
