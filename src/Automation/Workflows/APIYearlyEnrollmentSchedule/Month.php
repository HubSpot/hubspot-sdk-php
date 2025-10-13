<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIYearlyEnrollmentSchedule;

/**
 * The month of the date each year to run this flow.
 */
enum Month: string
{
    case JANUARY = 'JANUARY';

    case FEBRUARY = 'FEBRUARY';

    case MARCH = 'MARCH';

    case APRIL = 'APRIL';

    case MAY = 'MAY';

    case JUNE = 'JUNE';

    case JULY = 'JULY';

    case AUGUST = 'AUGUST';

    case SEPTEMBER = 'SEPTEMBER';

    case OCTOBER = 'OCTOBER';

    case NOVEMBER = 'NOVEMBER';

    case DECEMBER = 'DECEMBER';
}
