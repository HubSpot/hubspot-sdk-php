<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIContactFlowPutRequest;

enum Type: string
{
    case CONTACT_FLOW = 'CONTACT_FLOW';

    case PLATFORM_FLOW = 'PLATFORM_FLOW';
}
