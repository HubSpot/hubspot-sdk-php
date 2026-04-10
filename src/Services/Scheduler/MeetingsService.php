<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Scheduler;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Scheduler\MeetingsContract;
use HubSpotSDK\Services\Scheduler\Meetings\AdvancedService;
use HubSpotSDK\Services\Scheduler\Meetings\BasicService;

final class MeetingsService implements MeetingsContract
{
    /**
     * @api
     */
    public MeetingsRawService $raw;

    /**
     * @api
     */
    public AdvancedService $advanced;

    /**
     * @api
     */
    public BasicService $basic;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MeetingsRawService($client);
        $this->advanced = new AdvancedService($client);
        $this->basic = new BasicService($client);
    }
}
