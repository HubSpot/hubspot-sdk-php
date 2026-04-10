<?php

declare(strict_types=1);

namespace HubSpotSDK\Marketing\Emails\EmailGetHistogramParams;

enum Interval: string
{
    case DAY = 'DAY';

    case HOUR = 'HOUR';

    case MINUTE = 'MINUTE';

    case MONTH = 'MONTH';

    case QUARTER = 'QUARTER';

    case QUARTER_HOUR = 'QUARTER_HOUR';

    case SECOND = 'SECOND';

    case WEEK = 'WEEK';

    case YEAR = 'YEAR';
}
