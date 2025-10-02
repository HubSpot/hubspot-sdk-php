<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIRelativeDateTimeValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_relative_date_time_value = array{
 *   timeDelay: AutomationAPITimeDelay, type: value-of<Type>
 * }
 */
final class AutomationAPIRelativeDateTimeValue implements BaseModel
{
    /** @use SdkModel<automation_api_relative_date_time_value> */
    use SdkModel;

    #[Api]
    public AutomationAPITimeDelay $timeDelay;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIRelativeDateTimeValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIRelativeDateTimeValue::with(timeDelay: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIRelativeDateTimeValue)->withTimeDelay(...)->withType(...)
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
        AutomationAPITimeDelay $timeDelay,
        Type|string $type = 'RELATIVE_DATETIME'
    ): self {
        $obj = new self;

        $obj->timeDelay = $timeDelay;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withTimeDelay(AutomationAPITimeDelay $timeDelay): self
    {
        $obj = clone $this;
        $obj->timeDelay = $timeDelay;

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
