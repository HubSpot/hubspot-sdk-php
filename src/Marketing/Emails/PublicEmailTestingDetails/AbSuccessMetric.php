<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails\PublicEmailTestingDetails;

/**
 * Metric to determine the version that will be sent to the remaining contacts.
 */
enum AbSuccessMetric: string
{
    case CLICKS_BY_DELIVERED = 'CLICKS_BY_DELIVERED';

    case CLICKS_BY_OPENS = 'CLICKS_BY_OPENS';

    case OPENS_BY_DELIVERED = 'OPENS_BY_DELIVERED';
}
