<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\APIContactFlowCreateRequest;

use HubspotSDK\Automation\APIDailyEnrollmentSchedule;
use HubspotSDK\Automation\APIMonthlyRelativeDaysEnrollmentSchedule;
use HubspotSDK\Automation\APIMonthlySpecificDaysEnrollmentSchedule;
use HubspotSDK\Automation\APIPropertyBasedEnrollmentSchedule;
use HubspotSDK\Automation\APIWeeklyEnrollmentSchedule;
use HubspotSDK\Automation\APIYearlyEnrollmentSchedule;
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
            APIDailyEnrollmentSchedule::class,
            APIWeeklyEnrollmentSchedule::class,
            APIMonthlySpecificDaysEnrollmentSchedule::class,
            APIMonthlyRelativeDaysEnrollmentSchedule::class,
            APIYearlyEnrollmentSchedule::class,
            APIPropertyBasedEnrollmentSchedule::class,
        ];
    }
}
