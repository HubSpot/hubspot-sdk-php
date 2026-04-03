<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponseV2WithErrors;

/**
 * The status of the request processing.
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
