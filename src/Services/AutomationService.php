<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\AutomationContract;
use HubspotSDK\Services\Automation\ActionsService;

final class AutomationService implements AutomationContract
{
    /**
     * @api
     */
    public AutomationRawService $raw;

    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AutomationRawService($client);
        $this->actions = new ActionsService($client);
    }
}
