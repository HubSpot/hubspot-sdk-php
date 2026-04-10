<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\MetaContract;
use HubSpotSDK\Services\Meta\OriginsService;

final class MetaService implements MetaContract
{
    /**
     * @api
     */
    public MetaRawService $raw;

    /**
     * @api
     */
    public OriginsService $origins;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MetaRawService($client);
        $this->origins = new OriginsService($client);
    }
}
