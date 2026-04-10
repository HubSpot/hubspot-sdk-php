<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists\ListUpdateScheduleConversionParams;

/**
 * The unit of time for the inactivity period, such as (DAY, MONTH, WEEK).
 */
enum TimeUnit: string
{
    case DAY = 'DAY';

    case MONTH = 'MONTH';

    case WEEK = 'WEEK';
}
