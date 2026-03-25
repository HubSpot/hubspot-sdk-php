<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CmsContract;
use HubspotSDK\Services\Cms\BlogsService;

final class CmsService implements CmsContract
{
    /**
     * @api
     */
    public CmsRawService $raw;

    /**
     * @api
     */
    public BlogsService $blogs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CmsRawService($client);
        $this->blogs = new BlogsService($client);
    }
}
