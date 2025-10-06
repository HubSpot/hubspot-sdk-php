<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest;

enum Type: string
{
    case CONTACT_FLOW = 'CONTACT_FLOW';

    case PLATFORM_FLOW = 'PLATFORM_FLOW';
}
