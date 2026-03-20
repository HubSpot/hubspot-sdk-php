<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\AccountContract;
use HubspotSDK\Services\Account\ActivityService;

final class AccountService implements AccountContract
{
    /**
     * @api
     */
    public AccountRawService $raw;

    /**
     * @api
     */
    public ActivityService $activity;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AccountRawService($client);
        $this->activity = new ActivityService($client);
    }
}
