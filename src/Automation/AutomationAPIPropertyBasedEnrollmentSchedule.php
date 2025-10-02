<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIPropertyBasedEnrollmentSchedule\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_property_based_enrollment_schedule = array{
 *   dateProperty: string,
 *   daysDelta: int,
 *   timeOfDay: AutomationAPITimeOfDay,
 *   type: value-of<Type>,
 *   yearly: bool,
 * }
 */
final class AutomationAPIPropertyBasedEnrollmentSchedule implements BaseModel
{
    /** @use SdkModel<automation_api_property_based_enrollment_schedule> */
    use SdkModel;

    #[Api]
    public string $dateProperty;

    #[Api]
    public int $daysDelta;

    #[Api]
    public AutomationAPITimeOfDay $timeOfDay;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public bool $yearly;

    /**
     * `new AutomationAPIPropertyBasedEnrollmentSchedule()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIPropertyBasedEnrollmentSchedule::with(
     *   dateProperty: ..., daysDelta: ..., timeOfDay: ..., type: ..., yearly: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIPropertyBasedEnrollmentSchedule)
     *   ->withDateProperty(...)
     *   ->withDaysDelta(...)
     *   ->withTimeOfDay(...)
     *   ->withType(...)
     *   ->withYearly(...)
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
        string $dateProperty,
        int $daysDelta,
        AutomationAPITimeOfDay $timeOfDay,
        bool $yearly,
        Type|string $type = 'PROPERTY_BASED',
    ): self {
        $obj = new self;

        $obj->dateProperty = $dateProperty;
        $obj->daysDelta = $daysDelta;
        $obj->timeOfDay = $timeOfDay;
        $obj->type = $type instanceof Type ? $type->value : $type;
        $obj->yearly = $yearly;

        return $obj;
    }

    public function withDateProperty(string $dateProperty): self
    {
        $obj = clone $this;
        $obj->dateProperty = $dateProperty;

        return $obj;
    }

    public function withDaysDelta(int $daysDelta): self
    {
        $obj = clone $this;
        $obj->daysDelta = $daysDelta;

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

    public function withYearly(bool $yearly): self
    {
        $obj = clone $this;
        $obj->yearly = $yearly;

        return $obj;
    }
}
