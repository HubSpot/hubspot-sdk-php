<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CmsContract;
use HubspotSDK\Services\Cms\AuditLogsService;
use HubspotSDK\Services\Cms\BlogsService;
use HubspotSDK\Services\Cms\DomainsService;
use HubspotSDK\Services\Cms\HubdbService;
use HubspotSDK\Services\Cms\MediaBridgeService;
use HubspotSDK\Services\Cms\PagesService;
use HubspotSDK\Services\Cms\SiteSearchService;
use HubspotSDK\Services\Cms\SourceCodeService;
use HubspotSDK\Services\Cms\URLRedirectsService;

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
        $this->urlRedirects = new URLRedirectsService($client);
    }
}
