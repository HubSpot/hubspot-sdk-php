<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\MediaBridge\IntegratorSettingsContract;

final class IntegratorSettingsService implements IntegratorSettingsContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
