<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIMonthlyRelativeDaysEnrollmentSchedule;

enum MonthlyRelativeDays: string
{
    case LAST_DAY_OF_MONTH = 'LAST_DAY_OF_MONTH';

    case FIRST_MONDAY_OF_MONTH = 'FIRST_MONDAY_OF_MONTH';
}
