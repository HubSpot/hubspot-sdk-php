<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Meta;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Meta\OriginsContract;
use HubspotSDK\Services\Meta\Origins\IPRangesService;

final class OriginsService implements OriginsContract
{
    /**
     * @api
     */
    public OriginsRawService $raw;

    /**
     * @api
     */
    public IPRangesService $ipRanges;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OriginsRawService($client);
        $this->ipRanges = new IPRangesService($client);
    }
}
