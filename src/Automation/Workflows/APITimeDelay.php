<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APITimeDelay\DaysOfWeek;
use HubspotSDK\Automation\Workflows\APITimeDelay\TimeUnit;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APITimeDelayShape = array{
 *   daysOfWeek: list<value-of<DaysOfWeek>>,
 *   delta: int,
 *   timeUnit: value-of<TimeUnit>,
 *   timeOfDay?: APITimeOfDay|null,
 *   timeZoneStrategy?: APIStaticTimeZoneStrategy|null,
 * }
 */
final class APITimeDelay implements BaseModel
{
    /** @use SdkModel<APITimeDelayShape> */
    use SdkModel;

    /** @var list<value-of<DaysOfWeek>> $daysOfWeek */
    #[Api(list: DaysOfWeek::class)]
    public array $daysOfWeek;

    #[Api]
    public int $delta;

    /** @var value-of<TimeUnit> $timeUnit */
    #[Api(enum: TimeUnit::class)]
    public string $timeUnit;

    #[Api(optional: true)]
    public ?APITimeOfDay $timeOfDay;

    #[Api(optional: true)]
    public ?APIStaticTimeZoneStrategy $timeZoneStrategy;

    /**
     * `new APITimeDelay()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APITimeDelay::with(daysOfWeek: ..., delta: ..., timeUnit: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APITimeDelay)->withDaysOfWeek(...)->withDelta(...)->withTimeUnit(...)
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
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public static function with(
        array $daysOfWeek,
        int $delta,
        TimeUnit|string $timeUnit,
        ?APITimeOfDay $timeOfDay = null,
        ?APIStaticTimeZoneStrategy $timeZoneStrategy = null,
    ): self {
        $obj = new self;

        $obj['daysOfWeek'] = $daysOfWeek;
        $obj->delta = $delta;
        $obj['timeUnit'] = $timeUnit;

        null !== $timeOfDay && $obj->timeOfDay = $timeOfDay;
        null !== $timeZoneStrategy && $obj->timeZoneStrategy = $timeZoneStrategy;

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

    public function withDelta(int $delta): self
    {
        $obj = clone $this;
        $obj->delta = $delta;

        return $obj;
    }

    /**
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $obj = clone $this;
        $obj['timeUnit'] = $timeUnit;

        return $obj;
    }

    public function withTimeOfDay(APITimeOfDay $timeOfDay): self
    {
        $obj = clone $this;
        $obj->timeOfDay = $timeOfDay;

        return $obj;
    }

    public function withTimeZoneStrategy(
        APIStaticTimeZoneStrategy $timeZoneStrategy
    ): self {
        $obj = clone $this;
        $obj->timeZoneStrategy = $timeZoneStrategy;

        return $obj;
    }
}
