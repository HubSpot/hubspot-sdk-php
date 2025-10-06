<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Automation\WorkflowsContract;

final class WorkflowsService implements WorkflowsContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
