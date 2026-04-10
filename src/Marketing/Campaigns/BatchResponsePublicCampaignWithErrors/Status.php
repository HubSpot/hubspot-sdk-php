<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithErrors;

/**
 * The current status of the batch operation. Accepted values are: CANCELED, COMPLETE, PENDING, PROCESSING.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
