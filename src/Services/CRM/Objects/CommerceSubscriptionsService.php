<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects;

use HubspotSDK\Client;
use HubspotSDK\ServiceContracts\CRM\Objects\CommerceSubscriptionsContract;

final class CommerceSubscriptionsService implements CommerceSubscriptionsContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
