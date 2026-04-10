<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Scheduler;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Scheduler\MeetingsRawContract;

final class MeetingsRawService implements MeetingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
