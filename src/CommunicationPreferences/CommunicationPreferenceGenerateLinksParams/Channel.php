<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\CommunicationPreferenceGenerateLinksParams;

/**
 * The communication channel for which the links are generated. Must be 'EMAIL'.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
