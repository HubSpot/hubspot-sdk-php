<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows\APIPlatformFlowCreateRequest;

use HubspotSDK\Automation\Workflows\APIDailyEnrollmentSchedule;
use HubspotSDK\Automation\Workflows\APIMonthlyRelativeDaysEnrollmentSchedule;
use HubspotSDK\Automation\Workflows\APIMonthlySpecificDaysEnrollmentSchedule;
use HubspotSDK\Automation\Workflows\APIPropertyBasedEnrollmentSchedule;
use HubspotSDK\Automation\Workflows\APIWeeklyEnrollmentSchedule;
use HubspotSDK\Automation\Workflows\APIYearlyEnrollmentSchedule;
use HubspotSDK\Core\Concerns\SdkUnion;
use HubspotSDK\Core\Conversion\Contracts\Converter;
use HubspotSDK\Core\Conversion\Contracts\ConverterSource;

/**
 * @phpstan-import-type APIDailyEnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIDailyEnrollmentSchedule
 * @phpstan-import-type APIWeeklyEnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIWeeklyEnrollmentSchedule
 * @phpstan-import-type APIMonthlySpecificDaysEnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIMonthlySpecificDaysEnrollmentSchedule
 * @phpstan-import-type APIMonthlyRelativeDaysEnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIMonthlyRelativeDaysEnrollmentSchedule
 * @phpstan-import-type APIYearlyEnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIYearlyEnrollmentSchedule
 * @phpstan-import-type APIPropertyBasedEnrollmentScheduleShape from \HubspotSDK\Automation\Workflows\APIPropertyBasedEnrollmentSchedule
 *
 * @phpstan-type EnrollmentScheduleVariants = APIDailyEnrollmentSchedule|APIWeeklyEnrollmentSchedule|APIMonthlySpecificDaysEnrollmentSchedule|APIMonthlyRelativeDaysEnrollmentSchedule|APIYearlyEnrollmentSchedule|APIPropertyBasedEnrollmentSchedule
 * @phpstan-type EnrollmentScheduleShape = EnrollmentScheduleVariants|APIDailyEnrollmentScheduleShape|APIWeeklyEnrollmentScheduleShape|APIMonthlySpecificDaysEnrollmentScheduleShape|APIMonthlyRelativeDaysEnrollmentScheduleShape|APIYearlyEnrollmentScheduleShape|APIPropertyBasedEnrollmentScheduleShape
 */
final class EnrollmentSchedule implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
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
