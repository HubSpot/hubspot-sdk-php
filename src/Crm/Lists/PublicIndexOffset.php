<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicIndexOffsetShape = array{
 *   days?: int|null,
 *   hours?: int|null,
 *   milliseconds?: int|null,
 *   minutes?: int|null,
 *   months?: int|null,
 *   quarters?: int|null,
 *   seconds?: int|null,
 *   weeks?: int|null,
 *   years?: int|null,
 * }
 */
final class PublicIndexOffset implements BaseModel
{
    /** @use SdkModel<PublicIndexOffsetShape> */
    use SdkModel;

    /**
     * The number of days to offset.
     */
    #[Optional]
    public ?int $days;

    /**
     * The number of hours to offset.
     */
    #[Optional]
    public ?int $hours;

    /**
     * The number of milliseconds to offset.
     */
    #[Optional]
    public ?int $milliseconds;

    /**
     * The number of minutes to offset.
     */
    #[Optional]
    public ?int $minutes;

    /**
     * The number of months to offset.
     */
    #[Optional]
    public ?int $months;

    /**
     * The number of quarters to offset.
     */
    #[Optional]
    public ?int $quarters;

    /**
     * The number of seconds to offset.
     */
    #[Optional]
    public ?int $seconds;

    /**
     * The number of weeks to offset.
     */
    #[Optional]
    public ?int $weeks;

    /**
     * The number of years to offset.
     */
    #[Optional]
    public ?int $years;

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
        ?int $days = null,
        ?int $hours = null,
        ?int $milliseconds = null,
        ?int $minutes = null,
        ?int $months = null,
        ?int $quarters = null,
        ?int $seconds = null,
        ?int $weeks = null,
        ?int $years = null,
    ): self {
        $self = new self;

        null !== $days && $self['days'] = $days;
        null !== $hours && $self['hours'] = $hours;
        null !== $milliseconds && $self['milliseconds'] = $milliseconds;
        null !== $minutes && $self['minutes'] = $minutes;
        null !== $months && $self['months'] = $months;
        null !== $quarters && $self['quarters'] = $quarters;
        null !== $seconds && $self['seconds'] = $seconds;
        null !== $weeks && $self['weeks'] = $weeks;
        null !== $years && $self['years'] = $years;

        return $self;
    }

    /**
     * The number of days to offset.
     */
    public function withDays(int $days): self
    {
        $self = clone $this;
        $self['days'] = $days;

        return $self;
    }

    /**
     * The number of hours to offset.
     */
    public function withHours(int $hours): self
    {
        $self = clone $this;
        $self['hours'] = $hours;

        return $self;
    }

    /**
     * The number of milliseconds to offset.
     */
    public function withMilliseconds(int $milliseconds): self
    {
        $self = clone $this;
        $self['milliseconds'] = $milliseconds;

        return $self;
    }

    /**
     * The number of minutes to offset.
     */
    public function withMinutes(int $minutes): self
    {
        $self = clone $this;
        $self['minutes'] = $minutes;

        return $self;
    }

    /**
     * The number of months to offset.
     */
    public function withMonths(int $months): self
    {
        $self = clone $this;
        $self['months'] = $months;

        return $self;
    }

    /**
     * The number of quarters to offset.
     */
    public function withQuarters(int $quarters): self
    {
        $self = clone $this;
        $self['quarters'] = $quarters;

        return $self;
    }

    /**
     * The number of seconds to offset.
     */
    public function withSeconds(int $seconds): self
    {
        $self = clone $this;
        $self['seconds'] = $seconds;

        return $self;
    }

    /**
     * The number of weeks to offset.
     */
    public function withWeeks(int $weeks): self
    {
        $self = clone $this;
        $self['weeks'] = $weeks;

        return $self;
    }

    /**
     * The number of years to offset.
     */
    public function withYears(int $years): self
    {
        $self = clone $this;
        $self['years'] = $years;

        return $self;
    }
}
