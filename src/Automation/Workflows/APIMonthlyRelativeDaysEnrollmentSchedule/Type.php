<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIMonthlyRelativeDaysEnrollmentSchedule;

/**
 * The type of enrollment schedule this is, can be: "DAILY", "WEEKLY", "MONTHLY_SPECIFIC_DAYS", "MONTHLY_RELATIVE_DAYS", "YEARLY".
 */
enum Type: string
{
    case MONTHLY_RELATIVE_DAYS = 'MONTHLY_RELATIVE_DAYS';
}
