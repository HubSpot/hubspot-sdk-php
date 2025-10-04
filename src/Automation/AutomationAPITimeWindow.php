<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPITimeWindow\Day;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_time_window = array{
 *   day: value-of<Day>,
 *   endTime: AutomationAPITimeOfDay,
 *   startTime: AutomationAPITimeOfDay,
 * }
 */
final class AutomationAPITimeWindow implements BaseModel
{
    /** @use SdkModel<automation_api_time_window> */
    use SdkModel;

    /** @var value-of<Day> $day */
    #[Api(enum: Day::class)]
    public string $day;

    #[Api]
    public AutomationAPITimeOfDay $endTime;

    #[Api]
    public AutomationAPITimeOfDay $startTime;

    /**
     * `new AutomationAPITimeWindow()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPITimeWindow::with(day: ..., endTime: ..., startTime: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPITimeWindow)
     *   ->withDay(...)
     *   ->withEndTime(...)
     *   ->withStartTime(...)
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
     * @param Day|value-of<Day> $day
     */
    public static function with(
        Day|string $day,
        AutomationAPITimeOfDay $endTime,
        AutomationAPITimeOfDay $startTime,
    ): self {
        $obj = new self;

        $obj['day'] = $day;
        $obj->endTime = $endTime;
        $obj->startTime = $startTime;

        return $obj;
    }

    /**
     * @param Day|value-of<Day> $day
     */
    public function withDay(Day|string $day): self
    {
        $obj = clone $this;
        $obj['day'] = $day;

        return $obj;
    }

    public function withEndTime(AutomationAPITimeOfDay $endTime): self
    {
        $obj = clone $this;
        $obj->endTime = $endTime;

        return $obj;
    }

    public function withStartTime(AutomationAPITimeOfDay $startTime): self
    {
        $obj = clone $this;
        $obj->startTime = $startTime;

        return $obj;
    }
}
