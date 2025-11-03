<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\FeatureFlagsContract;
use HubspotSDK\Services\Crm\FeatureFlags\AppsService;
use HubspotSDK\Services\Crm\FeatureFlags\PortalsService;

final class FeatureFlagsService implements FeatureFlagsContract
{
    /**
     * @@api
     */
    public AppsService $apps;

    /**
     * @@api
     */
    public PortalsService $portals;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->apps = new AppsService($client);
        $this->portals = new PortalsService($client);
    }
}
