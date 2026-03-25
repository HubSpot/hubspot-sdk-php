<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\ActionResponseWithResultsSubscriptionDefinition;

/**
 * The current status of the operation, which can be PENDING, PROCESSING, CANCELED, or COMPLETE.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
