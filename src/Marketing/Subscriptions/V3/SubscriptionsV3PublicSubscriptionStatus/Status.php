<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V3\SubscriptionsV3PublicSubscriptionStatus;

enum Status: string
{
    case SUBSCRIBED = 'SUBSCRIBED';

    case NOT_SUBSCRIBED = 'NOT_SUBSCRIBED';
}
