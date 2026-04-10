<?php

declare(strict_types=1);

namespace HubSpotSDK\Automation\Sequences\PublicSequenceSettingsResponse;

/**
 * (deprecated) Defines the unenrollment strategy, with accepted values being ACCOUNT_BASED or LEAD_BASED. If ACCOUNT_BASED is used, all contacts associated with the same company will be unenrolled if one contact meets any of the unenrollment criteria.
 */
enum SellingStrategy: string
{
    case ACCOUNT_BASED = 'ACCOUNT_BASED';

    case LEAD_BASED = 'LEAD_BASED';
}
