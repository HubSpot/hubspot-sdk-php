<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Scheduler\MeetingsContract;

final class MeetingsService implements MeetingsContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
