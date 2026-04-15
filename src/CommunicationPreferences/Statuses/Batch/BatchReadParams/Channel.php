<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams;

/**
 * The communication channel to filter the subscription statuses. Must be 'EMAIL'.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
