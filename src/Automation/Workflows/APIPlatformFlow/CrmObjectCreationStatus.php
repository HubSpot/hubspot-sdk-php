<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIPlatformFlow;

enum CrmObjectCreationStatus: string
{
    case PENDING = 'PENDING';

    case COMPLETE = 'COMPLETE';
}
