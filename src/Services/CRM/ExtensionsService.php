<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\ExtensionsContract;
use HubspotSDK\Services\CRM\Extensions\CallingService;

final class ExtensionsService implements ExtensionsContract
{
    /**
     * @@api
     */
    public CallingService $calling;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->calling = new CallingService($client);
    }
}
