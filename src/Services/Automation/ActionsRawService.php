<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Automation;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Automation\ActionsRawContract;

final class ActionsRawService implements ActionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
