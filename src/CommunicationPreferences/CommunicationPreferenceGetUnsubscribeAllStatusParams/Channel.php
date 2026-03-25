<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\CommunicationPreferenceGetUnsubscribeAllStatusParams;

/**
 * The communication channel to unsubscribe from. Must be 'EMAIL'.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
