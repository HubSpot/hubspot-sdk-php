<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\SettingsContract;
use HubspotSDK\Services\Settings\UsersService;

final class SettingsService implements SettingsContract
{
    /**
     * @@api
     */
    public UsersService $users;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->users = new UsersService($client);
    }
}
