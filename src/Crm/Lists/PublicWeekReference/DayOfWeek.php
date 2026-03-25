<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\PublicWeekReference;

/**
 * The day of the week (SUNDAY, MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY, SATURDAY).
 */
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
