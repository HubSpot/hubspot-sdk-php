<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\BlogsContract;
use HubspotSDK\Services\Cms\Blogs\TagsService;

final class BlogsService implements BlogsContract
{
    /**
     * @@api
     */
    public TagsService $tags;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->tags = new TagsService($client);
    }
}
