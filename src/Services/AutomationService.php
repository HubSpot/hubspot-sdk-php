<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\AutomationContract;
use HubspotSDK\Services\Automation\ActionsService;
use HubspotSDK\Services\Automation\SequencesService;
use HubspotSDK\Services\Automation\WorkflowsService;

final class AutomationService implements AutomationContract
{
    /**
     * @@api
     */
    public ActionsService $actions;

    /**
     * @@api
     */
    public SequencesService $sequences;

    /**
     * @@api
     */
    public WorkflowsService $workflows;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
        $this->sequences = new SequencesService($client);
        $this->workflows = new WorkflowsService($client);
    }
}
