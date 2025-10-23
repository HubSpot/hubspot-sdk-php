<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards\IntegratorCardPayloadResponse;

enum ResponseVersion: string
{
    case V1 = 'v1';

    case V3 = 'v3';
}
