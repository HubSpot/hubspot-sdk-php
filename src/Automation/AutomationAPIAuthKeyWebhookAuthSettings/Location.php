<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIAuthKeyWebhookAuthSettings;

enum Location: string
{
    case HEADER = 'HEADER';

    case QUERY_PARAM = 'QUERY_PARAM';
}
