<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Meta;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Meta\OriginsRawContract;

final class OriginsRawService implements OriginsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
