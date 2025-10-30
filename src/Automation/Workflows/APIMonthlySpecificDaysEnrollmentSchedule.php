<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIMonthlySpecificDaysEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIMonthlySpecificDaysEnrollmentScheduleShape = array{
 *   daysOfMonth: list<int>, timeOfDay: APITimeOfDay, type: value-of<Type>
 * }
 */
final class APIMonthlySpecificDaysEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<APIMonthlySpecificDaysEnrollmentScheduleShape> */
    use SdkModel;

    /**
     * Which days of the month to run this workflow on.
     *
     * @var list<int> $daysOfMonth
     */
    #[Api(list: 'int')]
    public array $daysOfMonth;

    #[Api]
    public APITimeOfDay $timeOfDay;

    /**
     * The type of enrollment schedule this is, can be: "DAILY", "WEEKLY", "MONTHLY_SPECIFIC_DAYS", "MONTHLY_RELATIVE_DAYS", "YEARLY".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIMonthlySpecificDaysEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIMonthlySpecificDaysEnrollmentSchedule::with(
     *   daysOfMonth: ..., timeOfDay: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIMonthlySpecificDaysEnrollmentSchedule)
     *   ->withDaysOfMonth(...)
     *   ->withTimeOfDay(...)
     *   ->withType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<int> $daysOfMonth
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $daysOfMonth,
        APITimeOfDay $timeOfDay,
        Type|string $type = 'MONTHLY_SPECIFIC_DAYS',
    ): self {
        $obj = new self;

        $obj->daysOfMonth = $daysOfMonth;
        $obj->timeOfDay = $timeOfDay;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Which days of the month to run this workflow on.
     *
     * @param list<int> $daysOfMonth
     */
    public function withDaysOfMonth(array $daysOfMonth): self
    {
        $obj = clone $this;
        $obj->daysOfMonth = $daysOfMonth;

        return $obj;
    }

    public function withTimeOfDay(APITimeOfDay $timeOfDay): self
    {
        $obj = clone $this;
        $obj->timeOfDay = $timeOfDay;

        return $obj;
    }

    /**
     * The type of enrollment schedule this is, can be: "DAILY", "WEEKLY", "MONTHLY_SPECIFIC_DAYS", "MONTHLY_RELATIVE_DAYS", "YEARLY".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
