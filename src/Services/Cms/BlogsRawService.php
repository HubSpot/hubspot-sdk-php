<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Cms\BlogsRawContract;

final class BlogsRawService implements BlogsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
