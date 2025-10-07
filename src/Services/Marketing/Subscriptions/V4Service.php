<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4Contract;

final class V4Service implements V4Contract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
