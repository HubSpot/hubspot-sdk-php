<?php

declare(strict_types=1);

namespace HubspotSDK\Events\Definitions;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\Definitions\WeekReference\DayOfWeek;
use HubspotSDK\Events\Definitions\WeekReference\ReferenceType;

/**
 * @phpstan-type WeekReferenceShape = array{
 *   dayOfWeek: DayOfWeek|value-of<DayOfWeek>,
 *   referenceType: ReferenceType|value-of<ReferenceType>,
 *   hour?: int|null,
 *   millisecond?: int|null,
 *   minute?: int|null,
 *   second?: int|null,
 * }
 */
final class WeekReference implements BaseModel
{
    /** @use SdkModel<WeekReferenceShape> */
    use SdkModel;

    /** @var value-of<DayOfWeek> $dayOfWeek */
    #[Required(enum: DayOfWeek::class)]
    public string $dayOfWeek;

    /** @var value-of<ReferenceType> $referenceType */
    #[Required(enum: ReferenceType::class)]
    public string $referenceType;

    #[Optional]
    public ?int $hour;

    #[Optional]
    public ?int $millisecond;

    #[Optional]
    public ?int $minute;

    #[Optional]
    public ?int $second;

    /**
     * `new WeekReference()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WeekReference::with(dayOfWeek: ..., referenceType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WeekReference)->withDayOfWeek(...)->withReferenceType(...)
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
     * @param DayOfWeek|value-of<DayOfWeek> $dayOfWeek
     * @param ReferenceType|value-of<ReferenceType> $referenceType
     */
    public static function with(
        DayOfWeek|string $dayOfWeek,
        ReferenceType|string $referenceType = 'WEEK',
        ?int $hour = null,
        ?int $millisecond = null,
        ?int $minute = null,
        ?int $second = null,
    ): self {
        $self = new self;

        $self['dayOfWeek'] = $dayOfWeek;
        $self['referenceType'] = $referenceType;

        null !== $hour && $self['hour'] = $hour;
        null !== $millisecond && $self['millisecond'] = $millisecond;
        null !== $minute && $self['minute'] = $minute;
        null !== $second && $self['second'] = $second;

        return $self;
    }

    /**
     * @param DayOfWeek|value-of<DayOfWeek> $dayOfWeek
     */
    public function withDayOfWeek(DayOfWeek|string $dayOfWeek): self
    {
        $self = clone $this;
        $self['dayOfWeek'] = $dayOfWeek;

        return $self;
    }

    /**
     * @param ReferenceType|value-of<ReferenceType> $referenceType
     */
    public function withReferenceType(ReferenceType|string $referenceType): self
    {
        $self = clone $this;
        $self['referenceType'] = $referenceType;

        return $self;
    }

    public function withHour(int $hour): self
    {
        $self = clone $this;
        $self['hour'] = $hour;

        return $self;
    }

    public function withMillisecond(int $millisecond): self
    {
        $self = clone $this;
        $self['millisecond'] = $millisecond;

        return $self;
    }

    public function withMinute(int $minute): self
    {
        $self = clone $this;
        $self['minute'] = $minute;

        return $self;
    }

    public function withSecond(int $second): self
    {
        $self = clone $this;
        $self['second'] = $second;

        return $self;
    }
}
