<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIMonthlyRelativeDaysEnrollmentSchedule\MonthlyRelativeDays;
use HubspotSDK\Automation\AutomationAPIMonthlyRelativeDaysEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_monthly_relative_days_enrollment_schedule = array{
 *   monthlyRelativeDays: value-of<MonthlyRelativeDays>,
 *   timeOfDay: AutomationAPITimeOfDay,
 *   type: value-of<Type>,
 * }
 */
final class AutomationAPIMonthlyRelativeDaysEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<automation_api_monthly_relative_days_enrollment_schedule> */
    use SdkModel;

    /** @var value-of<MonthlyRelativeDays> $monthlyRelativeDays */
    #[Api(enum: MonthlyRelativeDays::class)]
    public string $monthlyRelativeDays;

    #[Api]
    public AutomationAPITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIMonthlyRelativeDaysEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIMonthlyRelativeDaysEnrollmentSchedule::with(
     *   monthlyRelativeDays: ..., timeOfDay: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIMonthlyRelativeDaysEnrollmentSchedule)
     *   ->withMonthlyRelativeDays(...)
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
     * @param MonthlyRelativeDays|value-of<MonthlyRelativeDays> $monthlyRelativeDays
     * @param Type|value-of<Type> $type
     */
    public static function with(
        MonthlyRelativeDays|string $monthlyRelativeDays,
        AutomationAPITimeOfDay $timeOfDay,
        Type|string $type = 'MONTHLY_RELATIVE_DAYS',
    ): self {
        $obj = new self;

        $obj->monthlyRelativeDays = $monthlyRelativeDays instanceof MonthlyRelativeDays ? $monthlyRelativeDays->value : $monthlyRelativeDays;
        $obj->timeOfDay = $timeOfDay;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * @param MonthlyRelativeDays|value-of<MonthlyRelativeDays> $monthlyRelativeDays
     */
    public function withMonthlyRelativeDays(
        MonthlyRelativeDays|string $monthlyRelativeDays
    ): self {
        $obj = clone $this;
        $obj->monthlyRelativeDays = $monthlyRelativeDays instanceof MonthlyRelativeDays ? $monthlyRelativeDays->value : $monthlyRelativeDays;

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
