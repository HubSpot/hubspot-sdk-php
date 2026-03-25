<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Meta;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Meta\OriginsRawContract;

final class OriginsRawService implements OriginsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
