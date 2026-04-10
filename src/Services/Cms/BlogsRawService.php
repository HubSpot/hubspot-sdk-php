<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Cms\BlogsRawContract;

final class BlogsRawService implements BlogsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
