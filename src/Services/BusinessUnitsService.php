<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\BusinessUnitsContract;
use HubSpotSDK\Services\BusinessUnits\BusinessUnitEntriesService;

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
