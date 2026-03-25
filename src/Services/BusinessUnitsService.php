<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\BusinessUnitsContract;

final class BusinessUnitsService implements BusinessUnitsContract
{
    /**
     * @api
     */
    public BusinessUnitsRawService $raw;

    /**
     * @api
     */
    public BusinessUnits\BusinessUnitsService $businessUnits;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BusinessUnitsRawService($client);
        $this->businessUnits = new BusinessUnits\BusinessUnitsService($client);
    }
}
