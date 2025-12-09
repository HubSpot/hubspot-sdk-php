<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\SchedulerContract;
use HubspotSDK\Services\Scheduler\MeetingsService;

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
