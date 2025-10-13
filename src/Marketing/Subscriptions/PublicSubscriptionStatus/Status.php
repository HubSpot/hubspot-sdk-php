<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;

/**
 * Whether the contact is subscribed.
 */
enum Status: string
{
    case SUBSCRIBED = 'SUBSCRIBED';

    case NOT_SUBSCRIBED = 'NOT_SUBSCRIBED';
}
