<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\CommunicationPreferenceUnsubscribeAllParams;

/**
 * The communication channel to unsubscribe from. Must be 'EMAIL'.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
