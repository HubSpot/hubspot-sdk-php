<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\SettingsRawContract;

final class SettingsRawService implements SettingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
