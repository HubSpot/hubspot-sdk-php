<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APITimeDelay;

enum TimeUnit: string
{
    case CENTURIES = 'CENTURIES';

    case DAYS = 'DAYS';

    case DECADES = 'DECADES';

    case ERAS = 'ERAS';

    case FOREVER = 'FOREVER';

    case HALF_DAYS = 'HALF_DAYS';

    case HOURS = 'HOURS';

    case MICROS = 'MICROS';

    case MILLENNIA = 'MILLENNIA';

    case MILLIS = 'MILLIS';

    case MINUTES = 'MINUTES';

    case MONTHS = 'MONTHS';

    case NANOS = 'NANOS';

    case SECONDS = 'SECONDS';

    case WEEKS = 'WEEKS';

    case YEARS = 'YEARS';
}
