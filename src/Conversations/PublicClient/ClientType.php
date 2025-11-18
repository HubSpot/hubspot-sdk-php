<?php

declare(strict_types=1);

namespace HubspotSDK\Conversations\PublicClient;

enum ClientType: string
{
    case HUBSPOT = 'HUBSPOT';

    case SYSTEM = 'SYSTEM';

    case INTEGRATION = 'INTEGRATION';

    case UNKNOWN = 'UNKNOWN';
}
