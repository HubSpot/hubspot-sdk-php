<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\PartialPublicStatusRequest;

/**
 * The current subscription status of the contact, which can be 'SUBSCRIBED', 'UNSUBSCRIBED', or 'NOT_SPECIFIED'.
 */
enum StatusState: string
{
    case NOT_SPECIFIED = 'NOT_SPECIFIED';

    case SUBSCRIBED = 'SUBSCRIBED';

    case UNSUBSCRIBED = 'UNSUBSCRIBED';
}
