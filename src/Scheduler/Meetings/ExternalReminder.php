<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalReminder\TimeUnit;

/**
 * @phpstan-type ExternalReminderShape = array{
 *   numberOfTimeUnits: int, timeUnit: TimeUnit|value-of<TimeUnit>
 * }
 */
final class ExternalReminder implements BaseModel
{
    /** @use SdkModel<ExternalReminderShape> */
    use SdkModel;

    /**
     * The number of timeUnits prior to the meeting start when the reminder will be sent.
     */
    #[Required]
    public int $numberOfTimeUnits;

    /**
     * Accepted values are: WEEKS, DAYS, HOURS, MINUTES.
     *
     * @var value-of<TimeUnit> $timeUnit
     */
    #[Required(enum: TimeUnit::class)]
    public string $timeUnit;

    /**
     * `new ExternalReminder()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalReminder::with(numberOfTimeUnits: ..., timeUnit: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalReminder)->withNumberOfTimeUnits(...)->withTimeUnit(...)
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
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public static function with(
        int $numberOfTimeUnits,
        TimeUnit|string $timeUnit
    ): self {
        $self = new self;

        $self['numberOfTimeUnits'] = $numberOfTimeUnits;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }

    /**
     * The number of timeUnits prior to the meeting start when the reminder will be sent.
     */
    public function withNumberOfTimeUnits(int $numberOfTimeUnits): self
    {
        $self = clone $this;
        $self['numberOfTimeUnits'] = $numberOfTimeUnits;

        return $self;
    }

    /**
     * Accepted values are: WEEKS, DAYS, HOURS, MINUTES.
     *
     * @param TimeUnit|value-of<TimeUnit> $timeUnit
     */
    public function withTimeUnit(TimeUnit|string $timeUnit): self
    {
        $self = clone $this;
        $self['timeUnit'] = $timeUnit;

        return $self;
    }
}
