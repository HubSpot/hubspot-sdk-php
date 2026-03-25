<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\PublicSubscriptionStatus;

/**
 * The current status of the subscription, which can be 'SUBSCRIBED' or 'NOT_SUBSCRIBED'.
 */
enum Status: string
{
    case NOT_SUBSCRIBED = 'NOT_SUBSCRIBED';

    case SUBSCRIBED = 'SUBSCRIBED';
}
