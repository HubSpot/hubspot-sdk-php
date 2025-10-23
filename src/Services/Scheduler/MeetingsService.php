<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Scheduler\MeetingsContract;
use HubspotSDK\Services\Scheduler\Meetings\CalendarService;
use HubspotSDK\Services\Scheduler\Meetings\MeetingsLinksService;

final class MeetingsService implements MeetingsContract
{
    /**
     * @@api
     */
    public CalendarService $calendar;

    /**
     * @@api
     */
    public MeetingsLinksService $meetingsLinks;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->calendar = new CalendarService($client);
        $this->meetingsLinks = new MeetingsLinksService($client);
    }
}
