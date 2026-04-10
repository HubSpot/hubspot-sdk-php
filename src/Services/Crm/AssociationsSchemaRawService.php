<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm;

use HubSpotSDK\Client;
use HubSpotSDK\ServiceContracts\Crm\AssociationsSchemaRawContract;

final class AssociationsSchemaRawService implements AssociationsSchemaRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}
}
