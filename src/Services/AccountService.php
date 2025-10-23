<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\AccountContract;
use HubspotSDK\Services\Account\ActivityService;
use HubspotSDK\Services\Account\DetailsService;
use HubspotSDK\Services\Account\UsageService;

final class AccountService implements AccountContract
{
    /**
     * @@api
     */
    public ActivityService $activity;

    /**
     * @@api
     */
    public DetailsService $details;

    /**
     * @@api
     */
    public UsageService $usage;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->activity = new ActivityService($client);
        $this->details = new DetailsService($client);
        $this->usage = new UsageService($client);
    }
}
