<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams;

/**
 * The communication channel from which subscribers will be unsubscribed. This parameter is required and currently supports only 'EMAIL'.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
