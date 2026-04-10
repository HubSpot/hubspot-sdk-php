<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\MarketingContract;
use HubSpotSDK\Services\Marketing\CampaignsService;
use HubSpotSDK\Services\Marketing\EmailsService;
use HubSpotSDK\Services\Marketing\MarketingEventsService;
use HubSpotSDK\Services\Marketing\SingleSendService;
use HubSpotSDK\Services\Marketing\TransactionalService;

final class MarketingService implements MarketingContract
{
    /**
     * @api
     */
    public MarketingRawService $raw;

    /**
     * @api
     */
    public CampaignsService $campaigns;

    /**
     * @api
     */
    public EmailsService $emails;

    /**
     * @api
     */
    public MarketingEventsService $marketingEvents;

    /**
     * @api
     */
    public SingleSendService $singleSend;

    /**
     * @api
     */
    public TransactionalService $transactional;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MarketingRawService($client);
        $this->campaigns = new CampaignsService($client);
        $this->emails = new EmailsService($client);
        $this->marketingEvents = new MarketingEventsService($client);
        $this->singleSend = new SingleSendService($client);
        $this->transactional = new TransactionalService($client);
    }
}
