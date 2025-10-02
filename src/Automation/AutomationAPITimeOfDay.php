<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_time_of_day = array{hour: int, minute: int}
 */
final class AutomationAPITimeOfDay implements BaseModel
{
    /** @use SdkModel<automation_api_time_of_day> */
    use SdkModel;

    #[Api]
    public int $hour;

    #[Api]
    public int $minute;

    /**
     * `new AutomationAPITimeOfDay()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPITimeOfDay::with(hour: ..., minute: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPITimeOfDay)->withHour(...)->withMinute(...)
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
    public static function with(int $hour, int $minute): self
    {
        $obj = new self;

        $obj->hour = $hour;
        $obj->minute = $minute;

        return $obj;
    }

    public function withHour(int $hour): self
    {
        $obj = clone $this;
        $obj->hour = $hour;

        return $obj;
    }

    public function withMinute(int $minute): self
    {
        $obj = clone $this;
        $obj->minute = $minute;

        return $obj;
    }
}
