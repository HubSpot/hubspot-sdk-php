<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms\Blogs\Posts;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\Blogs\Posts\MultiLanguageContract;

final class MultiLanguageService implements MultiLanguageContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
