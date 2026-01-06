<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Associations;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\Associations\V4RawContract;

final class V4RawService implements V4RawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
