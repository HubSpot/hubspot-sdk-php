<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIContactFlow;

enum FlowType: string
{
    case WORKFLOW = 'WORKFLOW';

    case ACTION_SET = 'ACTION_SET';

    case UNKNOWN = 'UNKNOWN';
}
