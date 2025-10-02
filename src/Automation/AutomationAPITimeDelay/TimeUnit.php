<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPITimeDelay;

enum TimeUnit: string
{
    case NANOS = 'NANOS';

    case MICROS = 'MICROS';

    case MILLIS = 'MILLIS';

    case SECONDS = 'SECONDS';

    case MINUTES = 'MINUTES';

    case HOURS = 'HOURS';

    case HALF_DAYS = 'HALF_DAYS';

    case DAYS = 'DAYS';

    case WEEKS = 'WEEKS';

    case MONTHS = 'MONTHS';

    case YEARS = 'YEARS';

    case DECADES = 'DECADES';

    case CENTURIES = 'CENTURIES';

    case MILLENNIA = 'MILLENNIA';

    case ERAS = 'ERAS';

    case FOREVER = 'FOREVER';
}
