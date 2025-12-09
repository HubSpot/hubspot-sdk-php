<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Extensions;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencingRawContract;

final class VideoConferencingRawService implements VideoConferencingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
