<?php

declare(strict_types=1);

namespace HubSpotSDK\CommunicationPreferences\PublicStatus;

/**
 * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
 */
enum Status: string
{
    case NOT_SPECIFIED = 'NOT_SPECIFIED';

    case SUBSCRIBED = 'SUBSCRIBED';

    case UNSUBSCRIBED = 'UNSUBSCRIBED';
}
