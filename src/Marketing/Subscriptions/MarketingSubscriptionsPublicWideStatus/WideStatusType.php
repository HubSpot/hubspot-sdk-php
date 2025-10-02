<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\MarketingSubscriptionsPublicWideStatus;

enum WideStatusType: string
{
    case PORTAL_WIDE = 'PORTAL_WIDE';

    case BUSINESS_UNIT_WIDE = 'BUSINESS_UNIT_WIDE';
}
