<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIContactFlow;

enum CrmObjectCreationStatus: string
{
    case PENDING = 'PENDING';

    case COMPLETE = 'COMPLETE';
}
