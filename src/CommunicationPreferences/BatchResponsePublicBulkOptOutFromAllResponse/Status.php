<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\BatchResponsePublicBulkOptOutFromAllResponse;

/**
 * The current status of the bulk opt-out operation, which can be PENDING, PROCESSING, CANCELED, or COMPLETE.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
