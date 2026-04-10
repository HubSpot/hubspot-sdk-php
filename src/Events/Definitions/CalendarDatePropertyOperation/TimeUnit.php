<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\CalendarDatePropertyOperation;

enum TimeUnit: string
{
    case DAY = 'DAY';

    case MONTH = 'MONTH';

    case QUARTER = 'QUARTER';

    case WEEK = 'WEEK';

    case YEAR = 'YEAR';
}
