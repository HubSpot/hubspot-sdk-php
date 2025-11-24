<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Sequences\EmailSettingsResponse;

enum SellingStrategy: string
{
    case ACCOUNT_BASED = 'ACCOUNT_BASED';

    case LEAD_BASED = 'LEAD_BASED';
}
