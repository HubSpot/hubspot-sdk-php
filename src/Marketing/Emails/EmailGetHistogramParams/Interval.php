<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails\EmailGetHistogramParams;

enum Interval: string
{
    case YEAR = 'YEAR';

    case QUARTER = 'QUARTER';

    case MONTH = 'MONTH';

    case WEEK = 'WEEK';

    case DAY = 'DAY';

    case HOUR = 'HOUR';

    case QUARTER_HOUR = 'QUARTER_HOUR';

    case MINUTE = 'MINUTE';

    case SECOND = 'SECOND';
}
