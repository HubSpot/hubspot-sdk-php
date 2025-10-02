<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Account;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Account\InfoContract;

final class InfoService implements InfoContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
