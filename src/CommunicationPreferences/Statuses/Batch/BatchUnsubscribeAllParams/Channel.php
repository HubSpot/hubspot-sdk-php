<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams;

/**
 * A required string specifying the communication channel. Currently, only 'EMAIL' is supported.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
