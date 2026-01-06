<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Scheduler\MeetingsRawContract;

final class MeetingsRawService implements MeetingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
