<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams;

/**
 * The communication channel to filter by. This parameter is required and currently only supports 'EMAIL'.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
