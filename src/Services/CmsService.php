<?php

declare(strict_types=1);

namespace HubSpotSDK\Services;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\CmsContract;
use HubSpotSDK\Services\Cms\AuditLogsService;
use HubSpotSDK\Services\Cms\BlogsService;
use HubSpotSDK\Services\Cms\DomainsService;
use HubSpotSDK\Services\Cms\HubdbService;
use HubSpotSDK\Services\Cms\MediaBridgeService;
use HubSpotSDK\Services\Cms\PagesService;
use HubSpotSDK\Services\Cms\SiteSearchService;
use HubSpotSDK\Services\Cms\SourceCodeService;
use HubSpotSDK\Services\Cms\URLMappingsService;
use HubSpotSDK\Services\Cms\URLRedirectsService;

final class CmsService implements CmsContract
{
    /**
     * @api
     */
    public CmsRawService $raw;

    /**
     * @api
     */
    public AuditLogsService $auditLogs;

    /**
     * @api
     */
    public BlogsService $blogs;

    /**
     * @api
     */
    public DomainsService $domains;

    /**
     * @api
     */
    public HubdbService $hubdb;

    /**
     * @api
     */
    public MediaBridgeService $mediaBridge;

    /**
     * @api
     */
    public PagesService $pages;

    /**
     * @api
     */
    public SiteSearchService $siteSearch;

    /**
     * @api
     */
    public SourceCodeService $sourceCode;

    /**
     * @api
     */
    public URLMappingsService $urlMappings;

    /**
     * @api
     */
    public URLRedirectsService $urlRedirects;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CmsRawService($client);
        $this->auditLogs = new AuditLogsService($client);
        $this->blogs = new BlogsService($client);
        $this->domains = new DomainsService($client);
        $this->hubdb = new HubdbService($client);
        $this->mediaBridge = new MediaBridgeService($client);
        $this->pages = new PagesService($client);
        $this->siteSearch = new SiteSearchService($client);
        $this->sourceCode = new SourceCodeService($client);
        $this->urlMappings = new URLMappingsService($client);
        $this->urlRedirects = new URLRedirectsService($client);
    }
}
