<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;

/**
 * Where the status is determined from e.g. PORTAL_WIDE_STATUS if the contact opted out from the portal.
 */
enum SourceOfStatus: string
{
    case PORTAL_WIDE_STATUS = 'PORTAL_WIDE_STATUS';

    case BRAND_WIDE_STATUS = 'BRAND_WIDE_STATUS';

    case SUBSCRIPTION_STATUS = 'SUBSCRIPTION_STATUS';
}
