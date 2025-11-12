<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Automation;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Automation\ActionsContract;
use HubspotSDK\Services\Automation\Actions\CallbacksService;
use HubspotSDK\Services\Automation\Actions\DefinitionsService;
use HubspotSDK\Services\Automation\Actions\FunctionsService;
use HubspotSDK\Services\Automation\Actions\RevisionsService;

final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public CallbacksService $callbacks;

    /**
     * @api
     */
    public DefinitionsService $definitions;

    /**
     * @api
     */
    public FunctionsService $functions;

    /**
     * @api
     */
    public RevisionsService $revisions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->callbacks = new CallbacksService($client);
        $this->definitions = new DefinitionsService($client);
        $this->functions = new FunctionsService($client);
        $this->revisions = new RevisionsService($client);
    }
}
