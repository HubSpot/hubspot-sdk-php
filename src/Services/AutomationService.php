<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\AutomationContract;
use HubSpotSDK\Services\Automation\ActionsService;
use HubSpotSDK\Services\Automation\SequencesService;

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
     * @api
     */
    public SequencesService $sequences;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AutomationRawService($client);
        $this->actions = new ActionsService($client);
        $this->sequences = new SequencesService($client);
    }
}
