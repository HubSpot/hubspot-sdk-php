<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling\Transcripts\TranscriptCreateInboundCallParams;

/**
 * The final status of the call, with accepted values including: BUSY, CALLING_CRM_USER, CANCELED, COMPLETED, CONNECTING, FAILED, HOLD, IN_PROGRESS, MISSED, NO_ANSWER, QUEUED, RINGING, UNKNOWN.
 */
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
