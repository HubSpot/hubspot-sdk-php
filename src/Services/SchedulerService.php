<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\SchedulerContract;
use HubspotSDK\Services\Scheduler\MeetingsService;

final class SchedulerService implements SchedulerContract
{
    /**
     * @@api
     */
    public MeetingsService $meetings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->meetings = new MeetingsService($client);
    }
}
