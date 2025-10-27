<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\FeatureFlagsContract;
use HubspotSDK\Services\CRM\FeatureFlags\AppsService;
use HubspotSDK\Services\CRM\FeatureFlags\PortalsService;

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
