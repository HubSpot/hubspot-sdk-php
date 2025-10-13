<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIMonthlyRelativeDaysEnrollmentSchedule;

/**
 * Can be either "LAST_DAY_OF_MONTH" or "FIRST_MONDAY_OF_MONTH".
 */
enum MonthlyRelativeDays: string
{
    case LAST_DAY_OF_MONTH = 'LAST_DAY_OF_MONTH';

    case FIRST_MONDAY_OF_MONTH = 'FIRST_MONDAY_OF_MONTH';
}
