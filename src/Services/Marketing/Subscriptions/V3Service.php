<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Subscriptions;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Marketing\Subscriptions\V3Contract;

final class V3Service implements V3Contract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
