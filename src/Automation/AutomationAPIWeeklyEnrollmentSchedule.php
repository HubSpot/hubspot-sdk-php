<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIWeeklyEnrollmentSchedule\DaysOfWeek;
use HubspotSDK\Automation\AutomationAPIWeeklyEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_weekly_enrollment_schedule = array{
 *   daysOfWeek: list<value-of<DaysOfWeek>>,
 *   timeOfDay: AutomationAPITimeOfDay,
 *   type: value-of<Type>,
 * }
 */
final class AutomationAPIWeeklyEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<automation_api_weekly_enrollment_schedule> */
    use SdkModel;

    /** @var list<value-of<DaysOfWeek>> $daysOfWeek */
    #[Api(list: DaysOfWeek::class)]
    public array $daysOfWeek;

    #[Api]
    public AutomationAPITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIWeeklyEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIWeeklyEnrollmentSchedule::with(
     *   daysOfWeek: ..., timeOfDay: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIWeeklyEnrollmentSchedule)
     *   ->withDaysOfWeek(...)
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
     * @param list<DaysOfWeek|value-of<DaysOfWeek>> $daysOfWeek
     * @param Type|value-of<Type> $type
     */
    public static function with(
        array $daysOfWeek,
        AutomationAPITimeOfDay $timeOfDay,
        Type|string $type = 'WEEKLY',
    ): self {
        $obj = new self;

        $obj['daysOfWeek'] = $daysOfWeek;
        $obj->timeOfDay = $timeOfDay;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param list<DaysOfWeek|value-of<DaysOfWeek>> $daysOfWeek
     */
    public function withDaysOfWeek(array $daysOfWeek): self
    {
        $obj = clone $this;
        $obj['daysOfWeek'] = $daysOfWeek;

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
        $obj['type'] = $type;

        return $obj;
    }
}
