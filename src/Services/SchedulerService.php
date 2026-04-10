<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\SchedulerContract;
use HubSpotSDK\Services\Scheduler\MeetingsService;

final class SchedulerService implements SchedulerContract
{
    /**
     * @api
     */
    public SchedulerRawService $raw;

    /**
     * @api
     */
    public MeetingsService $meetings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SchedulerRawService($client);
        $this->meetings = new MeetingsService($client);
    }
}
