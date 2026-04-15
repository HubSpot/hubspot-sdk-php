<?php

declare(strict_types=1);

namespace HubSpotSDK\Webhooks\BatchResponseSubscriptionResponse;

/**
 * The current status of the batch operation. Valid values include 'PENDING', 'PROCESSING', 'CANCELED', and 'COMPLETE'.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
