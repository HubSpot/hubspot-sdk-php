<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\MarketingContract;
use HubspotSDK\Services\Marketing\CampaignsService;

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
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MarketingRawService($client);
        $this->campaigns = new CampaignsService($client);
    }
}
