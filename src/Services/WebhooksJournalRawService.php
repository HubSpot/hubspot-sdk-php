<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\WebhooksJournalRawContract;

final class WebhooksJournalRawService implements WebhooksJournalRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
