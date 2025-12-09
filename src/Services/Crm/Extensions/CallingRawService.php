<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\Extensions\CallingRawContract;

final class CallingRawService implements CallingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
