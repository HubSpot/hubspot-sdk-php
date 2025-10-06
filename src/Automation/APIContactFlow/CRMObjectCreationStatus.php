<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\APIContactFlow;

enum CRMObjectCreationStatus: string
{
    case PENDING = 'PENDING';

    case COMPLETE = 'COMPLETE';
}
