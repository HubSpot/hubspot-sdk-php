<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\APIPlatformFlow;

enum CRMObjectCreationStatus: string
{
    case PENDING = 'PENDING';

    case COMPLETE = 'COMPLETE';
}
