<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists\ListScheduleConversionParams;

enum TimeUnit: string
{
    case DAY = 'DAY';

    case WEEK = 'WEEK';

    case MONTH = 'MONTH';
}
