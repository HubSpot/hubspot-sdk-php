<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams;

/**
 * The communication channel from which to unsubscribe the subscriber. This is a required parameter and must be 'EMAIL'.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
