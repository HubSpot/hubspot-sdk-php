<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIPlatformFlow;

enum CRMObjectCreationStatus: string
{
    case PENDING = 'PENDING';

    case COMPLETE = 'COMPLETE';
}
