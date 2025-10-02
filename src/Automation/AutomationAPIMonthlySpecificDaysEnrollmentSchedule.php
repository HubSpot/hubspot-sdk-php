<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIMonthlySpecificDaysEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_monthly_specific_days_enrollment_schedule = array{
 *   daysOfMonth: list<int>,
 *   timeOfDay: AutomationAPITimeOfDay,
 *   type: value-of<Type>,
 * }
 */
final class AutomationAPIMonthlySpecificDaysEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<automation_api_monthly_specific_days_enrollment_schedule> */
    use SdkModel;

    /** @var list<int> $daysOfMonth */
    #[Api(list: 'int')]
    public array $daysOfMonth;

    #[Api]
    public AutomationAPITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIMonthlySpecificDaysEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIMonthlySpecificDaysEnrollmentSchedule::with(
     *   daysOfMonth: ..., timeOfDay: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIMonthlySpecificDaysEnrollmentSchedule)
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
        AutomationAPITimeOfDay $timeOfDay,
        Type|string $type = 'MONTHLY_SPECIFIC_DAYS',
    ): self {
        $obj = new self;

        $obj->daysOfMonth = $daysOfMonth;
        $obj->timeOfDay = $timeOfDay;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * @param list<int> $daysOfMonth
     */
    public function withDaysOfMonth(array $daysOfMonth): self
    {
        $obj = clone $this;
        $obj->daysOfMonth = $daysOfMonth;

        return $obj;
    }

    public function withTimeOfDay(AutomationAPITimeOfDay $timeOfDay): self
    {
        $obj = clone $this;
        $obj->timeOfDay = $timeOfDay;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
