<?php

declare(strict_types=1);

namespace HubspotSDK\Events\CalendarDatePropertyOperation;

enum TimeUnit: string
{
    case DAY = 'DAY';

    case MONTH = 'MONTH';

    case QUARTER = 'QUARTER';

    case WEEK = 'WEEK';

    case YEAR = 'YEAR';
}
