<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGetStatusesParams;

/**
 * The communication channel for which the subscription status is being retrieved. This parameter is required and currently supports only 'EMAIL'.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
