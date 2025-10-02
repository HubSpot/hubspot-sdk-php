<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_input_variable = array{
 *   name: string,
 *   value: AutomationAPIActionDataValue|AutomationAPIObjectPropertyValue|AutomationAPIStaticValue|AutomationAPIRelativeDateTimeValue|AutomationAPITimestampValue|AutomationAPIIncrementValue|AutomationAPIFetchedObjectPropertyValue|AutomationAPIAppendObjectPropertyValue|AutomationAPIStaticAppendValue|AutomationAPIEnrollmentEventPropertyValue,
 * }
 */
final class AutomationAPIInputVariable implements BaseModel
{
    /** @use SdkModel<automation_api_input_variable> */
    use SdkModel;

    #[Api]
    public string $name;

    #[Api]
    public AutomationAPIActionDataValue|AutomationAPIObjectPropertyValue|AutomationAPIStaticValue|AutomationAPIRelativeDateTimeValue|AutomationAPITimestampValue|AutomationAPIIncrementValue|AutomationAPIFetchedObjectPropertyValue|AutomationAPIAppendObjectPropertyValue|AutomationAPIStaticAppendValue|AutomationAPIEnrollmentEventPropertyValue $value;

    /**
     * `new AutomationAPIInputVariable()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIInputVariable::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIInputVariable)->withName(...)->withValue(...)
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
     */
    public static function with(
        string $name,
        AutomationAPIActionDataValue|AutomationAPIObjectPropertyValue|AutomationAPIStaticValue|AutomationAPIRelativeDateTimeValue|AutomationAPITimestampValue|AutomationAPIIncrementValue|AutomationAPIFetchedObjectPropertyValue|AutomationAPIAppendObjectPropertyValue|AutomationAPIStaticAppendValue|AutomationAPIEnrollmentEventPropertyValue $value,
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->value = $value;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withValue(
        AutomationAPIActionDataValue|AutomationAPIObjectPropertyValue|AutomationAPIStaticValue|AutomationAPIRelativeDateTimeValue|AutomationAPITimestampValue|AutomationAPIIncrementValue|AutomationAPIFetchedObjectPropertyValue|AutomationAPIAppendObjectPropertyValue|AutomationAPIStaticAppendValue|AutomationAPIEnrollmentEventPropertyValue $value,
    ): self {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
