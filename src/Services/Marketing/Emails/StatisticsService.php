<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Emails;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Marketing\Emails\StatisticsContract;

final class StatisticsService implements StatisticsContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
