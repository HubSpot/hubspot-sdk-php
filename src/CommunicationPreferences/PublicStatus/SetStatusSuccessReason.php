<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\PublicStatus;

/**
 * The reason for the successful change in subscription status, such as 'RESUBSCRIBE_OCCURRED' or 'NO_STATUS_CHANGE'.
 */
enum SetStatusSuccessReason: string
{
    case NO_STATUS_CHANGE = 'NO_STATUS_CHANGE';

    case REQUESTED_CHANGE_OCCURRED = 'REQUESTED_CHANGE_OCCURRED';

    case RESUBSCRIBE_OCCURRED = 'RESUBSCRIBE_OCCURRED';

    case UNSUBSCRIBE_FROM_ALL_OCCURRED = 'UNSUBSCRIBE_FROM_ALL_OCCURRED';
}
