<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponseV2;

/**
 * The status of the response.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
