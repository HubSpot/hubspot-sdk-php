<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\FeatureFlagsRawContract;

final class FeatureFlagsRawService implements FeatureFlagsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
