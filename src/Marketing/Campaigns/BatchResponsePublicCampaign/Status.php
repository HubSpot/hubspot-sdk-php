<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaign;

/**
 * The current status of the batch operation, with possible values: CANCELED, COMPLETE, PENDING, PROCESSING.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
