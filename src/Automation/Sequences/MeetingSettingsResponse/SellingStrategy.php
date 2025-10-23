<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences\MeetingSettingsResponse;

enum SellingStrategy: string
{
    case LEAD_BASED = 'LEAD_BASED';

    case ACCOUNT_BASED = 'ACCOUNT_BASED';
}
