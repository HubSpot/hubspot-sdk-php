<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\AutomationAPIContactFlowPutRequest;

use HubspotSDK\Automation\AutomationAPIDailyEnrollmentSchedule;
use HubspotSDK\Automation\AutomationAPIMonthlyRelativeDaysEnrollmentSchedule;
use HubspotSDK\Automation\AutomationAPIMonthlySpecificDaysEnrollmentSchedule;
use HubspotSDK\Automation\AutomationAPIPropertyBasedEnrollmentSchedule;
use HubspotSDK\Automation\AutomationAPIWeeklyEnrollmentSchedule;
use HubspotSDK\Automation\AutomationAPIYearlyEnrollmentSchedule;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

final class EnrollmentSchedule implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,
     * string|Converter|ConverterSource,>
     */
    public static function variants(): array
    {
        return [
            AutomationAPIDailyEnrollmentSchedule::class,
            AutomationAPIWeeklyEnrollmentSchedule::class,
            AutomationAPIMonthlySpecificDaysEnrollmentSchedule::class,
            AutomationAPIMonthlyRelativeDaysEnrollmentSchedule::class,
            AutomationAPIYearlyEnrollmentSchedule::class,
            AutomationAPIPropertyBasedEnrollmentSchedule::class,
        ];
    }
}
