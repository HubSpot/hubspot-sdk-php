<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIBlockedDate\Month;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_blocked_date = array{
 *   dayOfMonth: int, month: value-of<Month>, year?: int
 * }
 */
final class AutomationAPIBlockedDate implements BaseModel
{
    /** @use SdkModel<automation_api_blocked_date> */
    use SdkModel;

    #[Api]
    public int $dayOfMonth;

    /** @var value-of<Month> $month */
    #[Api(enum: Month::class)]
    public string $month;

    #[Api(optional: true)]
    public ?int $year;

    /**
     * `new AutomationAPIBlockedDate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIBlockedDate::with(dayOfMonth: ..., month: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIBlockedDate)->withDayOfMonth(...)->withMonth(...)
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
     * @param Month|value-of<Month> $month
     */
    public static function with(
        int $dayOfMonth,
        Month|string $month,
        ?int $year = null
    ): self {
        $obj = new self;

        $obj->dayOfMonth = $dayOfMonth;
        $obj->month = $month instanceof Month ? $month->value : $month;

        null !== $year && $obj->year = $year;

        return $obj;
    }

    public function withDayOfMonth(int $dayOfMonth): self
    {
        $obj = clone $this;
        $obj->dayOfMonth = $dayOfMonth;

        return $obj;
    }

    /**
     * @param Month|value-of<Month> $month
     */
    public function withMonth(Month|string $month): self
    {
        $obj = clone $this;
        $obj->month = $month instanceof Month ? $month->value : $month;

        return $obj;
    }

    public function withYear(int $year): self
    {
        $obj = clone $this;
        $obj->year = $year;

        return $obj;
    }
}
