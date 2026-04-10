<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\ActionResponseWithResultsPublicStatus;

/**
 * Indicates the current status of the operation, with possible values: PENDING, PROCESSING, CANCELED, COMPLETE.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
