<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\Blogs\PostsContract;
use HubspotSDK\Services\Cms\Blogs\Posts\BatchService;
use HubspotSDK\Services\Cms\Blogs\Posts\MultiLanguageService;

final class PostsService implements PostsContract
{
    /**
     * @@api
     */
    public BatchService $batch;

    /**
     * @@api
     */
    public MultiLanguageService $multiLanguage;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->batch = new BatchService($client);
        $this->multiLanguage = new MultiLanguageService($client);
    }
}
