<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\PublicWideStatus;

/**
 * The type of communication channel, with 'EMAIL' as the only supported option.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
