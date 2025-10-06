<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V4\PublicStatus;

enum SetStatusSuccessReason: string
{
    case RESUBSCRIBE_OCCURRED = 'RESUBSCRIBE_OCCURRED';

    case NO_STATUS_CHANGE = 'NO_STATUS_CHANGE';

    case UNSUBSCRIBE_FROM_ALL_OCCURRED = 'UNSUBSCRIBE_FROM_ALL_OCCURRED';

    case REQUESTED_CHANGE_OCCURRED = 'REQUESTED_CHANGE_OCCURRED';
}
