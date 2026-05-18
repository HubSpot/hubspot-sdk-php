<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Cms\PagesContract;
use HubSpotSDK\Services\Cms\Pages\LandingPagesService;
use HubSpotSDK\Services\Cms\Pages\SitePagesService;

final class PagesService implements PagesContract
{
    /**
     * @api
     */
    public PagesRawService $raw;

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
        $this->raw = new PagesRawService($client);
        $this->landingPages = new LandingPagesService($client);
        $this->sitePages = new SitePagesService($client);
    }
}
