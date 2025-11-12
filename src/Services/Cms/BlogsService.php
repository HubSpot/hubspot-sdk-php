<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\BlogsContract;
use HubspotSDK\Services\Cms\Blogs\AuthorsService;
use HubspotSDK\Services\Cms\Blogs\PostsService;
use HubspotSDK\Services\Cms\Blogs\SettingsService;
use HubspotSDK\Services\Cms\Blogs\TagsService;

final class BlogsService implements BlogsContract
{
    /**
     * @api
     */
    public AuthorsService $authors;

    /**
     * @api
     */
    public PostsService $posts;

    /**
     * @api
     */
    public SettingsService $settings;

    /**
     * @api
     */
    public TagsService $tags;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->authors = new AuthorsService($client);
        $this->posts = new PostsService($client);
        $this->settings = new SettingsService($client);
        $this->tags = new TagsService($client);
    }
}
