<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Automation;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Automation\ActionsContract;
use HubSpotSDK\Services\Automation\Actions\CallbacksService;
use HubSpotSDK\Services\Automation\Actions\DefinitionsService;
use HubSpotSDK\Services\Automation\Actions\FunctionsService;
use HubSpotSDK\Services\Automation\Actions\RevisionsService;

final class ActionsService implements ActionsContract
{
    /**
     * @api
     */
    public ActionsRawService $raw;

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
        $this->raw = new ActionsRawService($client);
        $this->callbacks = new CallbacksService($client);
        $this->definitions = new DefinitionsService($client);
        $this->functions = new FunctionsService($client);
        $this->revisions = new RevisionsService($client);
    }
}
