<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\PublicClient;

enum ClientType: string
{
    case HUBSPOT = 'HUBSPOT';

    case INTEGRATION = 'INTEGRATION';

    case SYSTEM = 'SYSTEM';

    case UNKNOWN = 'UNKNOWN';
}
