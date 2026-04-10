<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse;

/**
 * The number version of the response.
 */
enum ResponseVersion: string
{
    case V1 = 'v1';

    case V3 = 'v3';
}
