<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions\CalendarDatePropertyOperation;

enum TimeUnit: string
{
    case DAY = 'DAY';

    case WEEK = 'WEEK';

    case MONTH = 'MONTH';

    case QUARTER = 'QUARTER';

    case YEAR = 'YEAR';
}
