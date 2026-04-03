<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\BusinessUnitsContract;
use HubspotSDK\Services\BusinessUnits\BusinessUnitEntriesService;

final class BusinessUnitsService implements BusinessUnitsContract
{
    /**
     * @api
     */
    public BusinessUnitsRawService $raw;

    /**
     * @api
     */
    public BusinessUnitEntriesService $businessUnitEntries;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BusinessUnitsRawService($client);
        $this->businessUnitEntries = new BusinessUnitEntriesService($client);
    }
}
