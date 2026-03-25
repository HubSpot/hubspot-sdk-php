<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams;

/**
 * The communication channel to check the unsubscribe-all status for. Currently, only 'EMAIL' is supported. This parameter is required.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
