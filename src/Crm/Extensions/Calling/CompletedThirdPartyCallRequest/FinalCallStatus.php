<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallRequest;

enum FinalCallStatus: string
{
    case BUSY = 'BUSY';

    case CALLING_CRM_USER = 'CALLING_CRM_USER';

    case CANCELED = 'CANCELED';

    case COMPLETED = 'COMPLETED';

    case CONNECTING = 'CONNECTING';

    case FAILED = 'FAILED';

    case HOLD = 'HOLD';

    case IN_PROGRESS = 'IN_PROGRESS';

    case MISSED = 'MISSED';

    case NO_ANSWER = 'NO_ANSWER';

    case QUEUED = 'QUEUED';

    case RINGING = 'RINGING';

    case UNKNOWN = 'UNKNOWN';
}
