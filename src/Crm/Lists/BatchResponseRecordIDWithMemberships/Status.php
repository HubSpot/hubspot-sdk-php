<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\BatchResponseRecordIDWithMemberships;

enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
