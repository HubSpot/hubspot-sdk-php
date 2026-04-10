<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\CommunicationPreferences;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\CommunicationPreferences\StatusesRawContract;

final class StatusesRawService implements StatusesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
