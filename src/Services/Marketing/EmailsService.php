<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Marketing\EmailsContract;
use HubspotSDK\Services\Marketing\Emails\SingleSendService;
use HubspotSDK\Services\Marketing\Emails\StatisticsService;

final class EmailsService implements EmailsContract
{
    /**
     * @@api
     */
    public SingleSendService $singleSend;

    /**
     * @@api
     */
    public StatisticsService $statistics;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->singleSend = new SingleSendService($client);
        $this->statistics = new StatisticsService($client);
    }
}
