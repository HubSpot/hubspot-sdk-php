<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\V3\SubscriptionsV3PublicSubscriptionStatus;

enum SourceOfStatus: string
{
    case PORTAL_WIDE_STATUS = 'PORTAL_WIDE_STATUS';

    case BRAND_WIDE_STATUS = 'BRAND_WIDE_STATUS';

    case SUBSCRIPTION_STATUS = 'SUBSCRIPTION_STATUS';
}
