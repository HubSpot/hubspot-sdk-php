<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams;

/**
 * The communication channel to filter the unsubscribe statuses. This parameter is required and currently supports 'EMAIL' as a valid value.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
