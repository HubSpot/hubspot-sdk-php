<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIDailyEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_daily_enrollment_schedule = array{
 *   timeOfDay: AutomationAPITimeOfDay, type: value-of<Type>
 * }
 */
final class AutomationAPIDailyEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<automation_api_daily_enrollment_schedule> */
    use SdkModel;

    #[Api]
    public AutomationAPITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIDailyEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIDailyEnrollmentSchedule::with(timeOfDay: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIDailyEnrollmentSchedule)->withTimeOfDay(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        AutomationAPITimeOfDay $timeOfDay,
        Type|string $type = 'DAILY'
    ): self {
        $obj = new self;

        $obj->timeOfDay = $timeOfDay;
        $obj->type = $type instanceof Type ? $type->value : $type;

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
