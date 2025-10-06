<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;

enum Status: string
{
    case SUBSCRIBED = 'SUBSCRIBED';

    case NOT_SUBSCRIBED = 'NOT_SUBSCRIBED';
}
