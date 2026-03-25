<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams;

/**
 * A required string indicating the communication channel to retrieve the status for. Valid value is 'EMAIL'.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
