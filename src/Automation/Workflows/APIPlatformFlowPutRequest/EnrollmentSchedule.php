<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIPlatformFlowPutRequest;

use HubspotSDK\Automation\Workflows\APIDailyEnrollmentSchedule;
use HubspotSDK\Automation\Workflows\APIMonthlyRelativeDaysEnrollmentSchedule;
use HubspotSDK\Automation\Workflows\APIMonthlySpecificDaysEnrollmentSchedule;
use HubspotSDK\Automation\Workflows\APIPropertyBasedEnrollmentSchedule;
use HubspotSDK\Automation\Workflows\APIWeeklyEnrollmentSchedule;
use HubspotSDK\Automation\Workflows\APIYearlyEnrollmentSchedule;
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
