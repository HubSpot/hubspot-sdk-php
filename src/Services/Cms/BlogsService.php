<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\BlogsContract;
use HubspotSDK\Services\Cms\Blogs\PostsService;
use HubspotSDK\Services\Cms\Blogs\SettingsService;

final class BlogsService implements BlogsContract
{
    /**
     * @api
     */
    public BlogsRawService $raw;

    /**
     * @api
     */
    public PostsService $posts;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BlogsRawService($client);
        $this->posts = new PostsService($client);
        $this->settings = new SettingsService($client);
    }
}
