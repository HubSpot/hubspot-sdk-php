<?php

declare(strict_types=1);

namespace HubspotSDK\CommunicationPreferences\PublicWideStatus;

/**
 * The type of wide status, which can be 'PORTAL_WIDE' or 'BUSINESS_UNIT_WIDE'.
 */
enum WideStatusType: string
{
    case BUSINESS_UNIT_WIDE = 'BUSINESS_UNIT_WIDE';

    case PORTAL_WIDE = 'PORTAL_WIDE';
}
