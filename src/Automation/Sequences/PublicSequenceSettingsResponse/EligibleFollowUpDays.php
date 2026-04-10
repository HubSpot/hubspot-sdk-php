<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Sequences\PublicSequenceSettingsResponse;

/**
 * Specifies the days on which follow-up actions are allowed.
 */
enum EligibleFollowUpDays: string
{
    case BUSINESS_DAYS = 'BUSINESS_DAYS';

    case EVERYDAY = 'EVERYDAY';

    case WEEKDAYS_ONLY = 'WEEKDAYS_ONLY';
}
