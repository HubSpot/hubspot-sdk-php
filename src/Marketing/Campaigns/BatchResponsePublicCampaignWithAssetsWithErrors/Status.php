<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssetsWithErrors;

enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
