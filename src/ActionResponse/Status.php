<?php

declare(strict_types=1);

namespace HubSpotSDK\ActionResponse;

/**
 * The current status of the action, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
