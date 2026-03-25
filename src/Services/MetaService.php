<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\MetaContract;
use HubspotSDK\Services\Meta\OriginsService;

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
