<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects\Deals;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\Objects\Deals\BatchContract;

final class BatchService implements BatchContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
