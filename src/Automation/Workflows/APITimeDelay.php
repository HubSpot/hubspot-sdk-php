<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIStaticTimeZoneStrategy\Type;
use HubspotSDK\Automation\Workflows\APITimeDelay\DaysOfWeek;
use HubspotSDK\Automation\Workflows\APITimeDelay\TimeUnit;
use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
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
    #[Required(list: DaysOfWeek::class)]
    public array $daysOfWeek;

    #[Required]
    public int $delta;

    /** @var value-of<TimeUnit> $timeUnit */
    #[Required(enum: TimeUnit::class)]
    public string $timeUnit;

    #[Optional]
    public ?APITimeOfDay $timeOfDay;

    #[Optional]
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
     * @param APITimeOfDay|array{hour: int, minute: int} $timeOfDay
     * @param APIStaticTimeZoneStrategy|array{
     *   timeZoneID: string, type: value-of<Type>
     * } $timeZoneStrategy
     */
    public static function with(
        array $daysOfWeek,
        int $delta,
        TimeUnit|string $timeUnit,
        APITimeOfDay|array|null $timeOfDay = null,
        APIStaticTimeZoneStrategy|array|null $timeZoneStrategy = null,
    ): self {
        $self = new self;

        $self['daysOfWeek'] = $daysOfWeek;
        $self['delta'] = $delta;
        $self['timeUnit'] = $timeUnit;

        null !== $timeOfDay && $self['timeOfDay'] = $timeOfDay;
        null !== $timeZoneStrategy && $self['timeZoneStrategy'] = $timeZoneStrategy;

        return $self;
    }

    /**
     * @param list<DaysOfWeek|value-of<DaysOfWeek>> $daysOfWeek
     */
    public function withDaysOfWeek(array $daysOfWeek): self
    {
        $self = clone $this;
        $self['daysOfWeek'] = $daysOfWeek;

        return $self;
    }

    public function withDelta(int $delta): self
    {
        $self = clone $this;
        $self['delta'] = $delta;

        return $self;
    }

    /**
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }

    /**
     * @param APITimeOfDay|array{hour: int, minute: int} $timeOfDay
     */
    public function withTimeOfDay(APITimeOfDay|array $timeOfDay): self
    {
        $self = clone $this;
        $self['timeOfDay'] = $timeOfDay;

        return $self;
    }

    /**
     * @param APIStaticTimeZoneStrategy|array{
     *   timeZoneID: string, type: value-of<Type>
     * } $timeZoneStrategy
     */
    public function withTimeZoneStrategy(
        APIStaticTimeZoneStrategy|array $timeZoneStrategy
    ): self {
        $self = clone $this;
        $self['timeZoneStrategy'] = $timeZoneStrategy;

        return $self;
    }
}
