<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\PublicSubscriptionStatus;

/**
 * Indicates the origin of the subscription status, with possible values being 'PORTAL_WIDE_STATUS', 'BRAND_WIDE_STATUS', or 'SUBSCRIPTION_STATUS'.
 */
enum SourceOfStatus: string
{
    case BRAND_WIDE_STATUS = 'BRAND_WIDE_STATUS';

    case PORTAL_WIDE_STATUS = 'PORTAL_WIDE_STATUS';

    case SUBSCRIPTION_STATUS = 'SUBSCRIPTION_STATUS';
}
