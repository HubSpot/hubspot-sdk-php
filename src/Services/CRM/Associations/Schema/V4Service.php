<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Associations\Schema;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\Associations\Schema\V4Contract;
use HubspotSDK\Services\CRM\Associations\Schema\V4\ConfigurationsService;
use HubspotSDK\Services\CRM\Associations\Schema\V4\DefinitionsService;

final class V4Service implements V4Contract
{
    /**
     * @@api
     */
    public ConfigurationsService $configurations;

    /**
     * @@api
     */
    public DefinitionsService $definitions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->configurations = new ConfigurationsService($client);
        $this->definitions = new DefinitionsService($client);
    }
}
