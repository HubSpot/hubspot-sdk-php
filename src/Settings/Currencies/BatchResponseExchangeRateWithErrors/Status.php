<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Currencies\BatchResponseExchangeRateWithErrors;

/**
 * The current status of the response (e.g. COMPLETED).
 */
enum Status: string
{
    case CANCELED = 'CANCELED';

    case COMPLETE = 'COMPLETE';

    case PENDING = 'PENDING';

    case PROCESSING = 'PROCESSING';
}
