<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIContactFlow;

enum CRMObjectCreationStatus: string
{
    case PENDING = 'PENDING';

    case COMPLETE = 'COMPLETE';
}
