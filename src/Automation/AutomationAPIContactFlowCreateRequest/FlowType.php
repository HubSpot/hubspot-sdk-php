<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIContactFlowCreateRequest;

enum FlowType: string
{
    case WORKFLOW = 'WORKFLOW';

    case ACTION_SET = 'ACTION_SET';

    case UNKNOWN = 'UNKNOWN';
}
