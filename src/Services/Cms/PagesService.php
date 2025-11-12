<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\PagesContract;
use HubspotSDK\Services\Cms\Pages\LandingPagesService;
use HubspotSDK\Services\Cms\Pages\SitePagesService;

final class PagesService implements PagesContract
{
    /**
     * @api
     */
    public LandingPagesService $landingPages;

    /**
     * @api
     */
    public SitePagesService $sitePages;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->landingPages = new LandingPagesService($client);
        $this->sitePages = new SitePagesService($client);
    }
}
