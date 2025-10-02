<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIPlatformFlow;

enum CRMObjectCreationStatus: string
{
    case PENDING = 'PENDING';

    case COMPLETE = 'COMPLETE';
}
