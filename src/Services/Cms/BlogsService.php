<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Cms\BlogsContract;
use HubSpotSDK\Services\Cms\Blogs\AuthorsService;
use HubSpotSDK\Services\Cms\Blogs\PostsService;
use HubSpotSDK\Services\Cms\Blogs\SettingsService;
use HubSpotSDK\Services\Cms\Blogs\TagsService;

final class BlogsService implements BlogsContract
{
    /**
     * @api
     */
    public BlogsRawService $raw;

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
        $this->raw = new BlogsRawService($client);
        $this->authors = new AuthorsService($client);
        $this->posts = new PostsService($client);
        $this->settings = new SettingsService($client);
        $this->tags = new TagsService($client);
    }
}
