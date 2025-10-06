<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails\PublicEmailTestingDetails;

enum AbSuccessMetric: string
{
    case CLICKS_BY_OPENS = 'CLICKS_BY_OPENS';

    case CLICKS_BY_DELIVERED = 'CLICKS_BY_DELIVERED';

    case OPENS_BY_DELIVERED = 'OPENS_BY_DELIVERED';
}
