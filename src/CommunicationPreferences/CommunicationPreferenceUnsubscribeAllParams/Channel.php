<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams;

/**
 * The communication channel from which to unsubscribe the subscriber. Must be 'EMAIL'.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
