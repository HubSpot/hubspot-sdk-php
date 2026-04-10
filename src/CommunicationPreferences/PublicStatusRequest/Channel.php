<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\PublicStatusRequest;

/**
 * The type of communication channel. Currently, only `EMAIL` is supported.
 */
enum Channel: string
{
    case EMAIL = 'EMAIL';
}
