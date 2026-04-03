<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\MarketingContract;
use HubspotSDK\Services\Marketing\CampaignsService;
use HubspotSDK\Services\Marketing\EmailsService;
use HubspotSDK\Services\Marketing\MarketingEventsService;
use HubspotSDK\Services\Marketing\SingleSendService;
use HubspotSDK\Services\Marketing\TransactionalService;

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
