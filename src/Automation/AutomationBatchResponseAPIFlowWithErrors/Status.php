<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationBatchResponseAPIFlowWithErrors;

enum Status: string
{
    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';

    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';
}
