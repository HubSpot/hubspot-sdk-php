<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions\WeekReference;

enum DayOfWeek: string
{
    case FRIDAY = 'FRIDAY';

    case MONDAY = 'MONDAY';

    case SATURDAY = 'SATURDAY';

    case SUNDAY = 'SUNDAY';

    case THURSDAY = 'THURSDAY';

    case TUESDAY = 'TUESDAY';

    case WEDNESDAY = 'WEDNESDAY';
}
