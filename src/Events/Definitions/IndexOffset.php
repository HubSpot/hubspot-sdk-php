<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IndexOffsetShape = array{
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
final class IndexOffset implements BaseModel
{
    /** @use SdkModel<IndexOffsetShape> */
    use SdkModel;

    #[Optional]
    public ?int $days;

    #[Optional]
    public ?int $hours;

    #[Optional]
    public ?int $milliseconds;

    #[Optional]
    public ?int $minutes;

    #[Optional]
    public ?int $months;

    #[Optional]
    public ?int $quarters;

    #[Optional]
    public ?int $seconds;

    #[Optional]
    public ?int $weeks;

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

    public function withDays(int $days): self
    {
        $self = clone $this;
        $self['days'] = $days;

        return $self;
    }

    public function withHours(int $hours): self
    {
        $self = clone $this;
        $self['hours'] = $hours;

        return $self;
    }

    public function withMilliseconds(int $milliseconds): self
    {
        $self = clone $this;
        $self['milliseconds'] = $milliseconds;

        return $self;
    }

    public function withMinutes(int $minutes): self
    {
        $self = clone $this;
        $self['minutes'] = $minutes;

        return $self;
    }

    public function withMonths(int $months): self
    {
        $self = clone $this;
        $self['months'] = $months;

        return $self;
    }

    public function withQuarters(int $quarters): self
    {
        $self = clone $this;
        $self['quarters'] = $quarters;

        return $self;
    }

    public function withSeconds(int $seconds): self
    {
        $self = clone $this;
        $self['seconds'] = $seconds;

        return $self;
    }

    public function withWeeks(int $weeks): self
    {
        $self = clone $this;
        $self['weeks'] = $weeks;

        return $self;
    }

    public function withYears(int $years): self
    {
        $self = clone $this;
        $self['years'] = $years;

        return $self;
    }
}
