<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicWeekReference\DayOfWeek;
use HubspotSDK\Crm\Lists\PublicWeekReference\ReferenceType;

/**
 * @phpstan-type PublicWeekReferenceShape = array{
 *   dayOfWeek: DayOfWeek|value-of<DayOfWeek>,
 *   referenceType: ReferenceType|value-of<ReferenceType>,
 *   hour?: int|null,
 *   millisecond?: int|null,
 *   minute?: int|null,
 *   second?: int|null,
 * }
 */
final class PublicWeekReference implements BaseModel
{
    /** @use SdkModel<PublicWeekReferenceShape> */
    use SdkModel;

    /**
     * The day of the week (SUNDAY, MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY, SATURDAY).
     *
     * @var value-of<DayOfWeek> $dayOfWeek
     */
    #[Required(enum: DayOfWeek::class)]
    public string $dayOfWeek;

    /**
     * Indicates the type of reference (WEEK).
     *
     * @var value-of<ReferenceType> $referenceType
     */
    #[Required(enum: ReferenceType::class)]
    public string $referenceType;

    /**
     * The hour component of the week reference.
     */
    #[Optional]
    public ?int $hour;

    /**
     * The millisecond component of the week reference.
     */
    #[Optional]
    public ?int $millisecond;

    /**
     * The minute component of the week reference.
     */
    #[Optional]
    public ?int $minute;

    /**
     * The second component of the week reference.
     */
    #[Optional]
    public ?int $second;

    /**
     * `new PublicWeekReference()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicWeekReference::with(dayOfWeek: ..., referenceType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicWeekReference)->withDayOfWeek(...)->withReferenceType(...)
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
     * The day of the week (SUNDAY, MONDAY, TUESDAY, WEDNESDAY, THURSDAY, FRIDAY, SATURDAY).
     *
     * @param DayOfWeek|value-of<DayOfWeek> $dayOfWeek
     */
    public function withDayOfWeek(DayOfWeek|string $dayOfWeek): self
    {
        $self = clone $this;
        $self['dayOfWeek'] = $dayOfWeek;

        return $self;
    }

    /**
     * Indicates the type of reference (WEEK).
     *
     * @param ReferenceType|value-of<ReferenceType> $referenceType
     */
    public function withReferenceType(ReferenceType|string $referenceType): self
    {
        $self = clone $this;
        $self['referenceType'] = $referenceType;

        return $self;
    }

    /**
     * The hour component of the week reference.
     */
    public function withHour(int $hour): self
    {
        $self = clone $this;
        $self['hour'] = $hour;

        return $self;
    }

    /**
     * The millisecond component of the week reference.
     */
    public function withMillisecond(int $millisecond): self
    {
        $self = clone $this;
        $self['millisecond'] = $millisecond;

        return $self;
    }

    /**
     * The minute component of the week reference.
     */
    public function withMinute(int $minute): self
    {
        $self = clone $this;
        $self['minute'] = $minute;

        return $self;
    }

    /**
     * The second component of the week reference.
     */
    public function withSecond(int $second): self
    {
        $self = clone $this;
        $self['second'] = $second;

        return $self;
    }
}
