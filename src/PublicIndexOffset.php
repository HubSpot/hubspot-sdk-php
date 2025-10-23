<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_index_offset = array{
 *   days?: int,
 *   hours?: int,
 *   milliseconds?: int,
 *   minutes?: int,
 *   months?: int,
 *   quarters?: int,
 *   seconds?: int,
 *   weeks?: int,
 *   years?: int,
 * }
 */
final class PublicIndexOffset implements BaseModel
{
    /** @use SdkModel<public_index_offset> */
    use SdkModel;

    #[Api(optional: true)]
    public ?int $days;

    #[Api(optional: true)]
    public ?int $hours;

    #[Api(optional: true)]
    public ?int $milliseconds;

    #[Api(optional: true)]
    public ?int $minutes;

    #[Api(optional: true)]
    public ?int $months;

    #[Api(optional: true)]
    public ?int $quarters;

    #[Api(optional: true)]
    public ?int $seconds;

    #[Api(optional: true)]
    public ?int $weeks;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $days && $obj->days = $days;
        null !== $hours && $obj->hours = $hours;
        null !== $milliseconds && $obj->milliseconds = $milliseconds;
        null !== $minutes && $obj->minutes = $minutes;
        null !== $months && $obj->months = $months;
        null !== $quarters && $obj->quarters = $quarters;
        null !== $seconds && $obj->seconds = $seconds;
        null !== $weeks && $obj->weeks = $weeks;
        null !== $years && $obj->years = $years;

        return $obj;
    }

    public function withDays(int $days): self
    {
        $obj = clone $this;
        $obj->days = $days;

        return $obj;
    }

    public function withHours(int $hours): self
    {
        $obj = clone $this;
        $obj->hours = $hours;

        return $obj;
    }

    public function withMilliseconds(int $milliseconds): self
    {
        $obj = clone $this;
        $obj->milliseconds = $milliseconds;

        return $obj;
    }

    public function withMinutes(int $minutes): self
    {
        $obj = clone $this;
        $obj->minutes = $minutes;

        return $obj;
    }

    public function withMonths(int $months): self
    {
        $obj = clone $this;
        $obj->months = $months;

        return $obj;
    }

    public function withQuarters(int $quarters): self
    {
        $obj = clone $this;
        $obj->quarters = $quarters;

        return $obj;
    }

    public function withSeconds(int $seconds): self
    {
        $obj = clone $this;
        $obj->seconds = $seconds;

        return $obj;
    }

    public function withWeeks(int $weeks): self
    {
        $obj = clone $this;
        $obj->weeks = $weeks;

        return $obj;
    }

    public function withYears(int $years): self
    {
        $obj = clone $this;
        $obj->years = $years;

        return $obj;
    }
}
