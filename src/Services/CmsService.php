<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CmsContract;
use HubspotSDK\Services\Cms\BlogsService;
use HubspotSDK\Services\Cms\DomainsService;
use HubspotSDK\Services\Cms\HubdbService;
use HubspotSDK\Services\Cms\URLRedirectsService;

final class CmsService implements CmsContract
{
    /**
     * @@api
     */
    public BlogsService $blogs;

    /**
     * @@api
     */
    public DomainsService $domains;

    /**
     * @@api
     */
    public HubdbService $hubdb;

    /**
     * @@api
     */
    public URLRedirectsService $urlRedirects;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->blogs = new BlogsService($client);
        $this->domains = new DomainsService($client);
        $this->hubdb = new HubdbService($client);
        $this->urlRedirects = new URLRedirectsService($client);
    }
}
