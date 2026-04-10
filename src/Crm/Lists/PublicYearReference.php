<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicYearReference\ReferenceType;

/**
 * @phpstan-type PublicYearReferenceShape = array{
 *   day: int,
 *   month: int,
 *   referenceType: ReferenceType|value-of<ReferenceType>,
 *   hour?: int|null,
 *   millisecond?: int|null,
 *   minute?: int|null,
 *   second?: int|null,
 * }
 */
final class PublicYearReference implements BaseModel
{
    /** @use SdkModel<PublicYearReferenceShape> */
    use SdkModel;

    /**
     * The day component of the year reference.
     */
    #[Required]
    public int $day;

    /**
     * The month component of the year reference.
     */
    #[Required]
    public int $month;

    /**
     * Indicates the type of reference (YEAR).
     *
     * @var value-of<ReferenceType> $referenceType
     */
    #[Required(enum: ReferenceType::class)]
    public string $referenceType;

    /**
     * The hour component of the year reference.
     */
    #[Optional]
    public ?int $hour;

    /**
     * The millisecond component of the year reference.
     */
    #[Optional]
    public ?int $millisecond;

    /**
     * The minute component of the year reference.
     */
    #[Optional]
    public ?int $minute;

    /**
     * The second component of the year reference.
     */
    #[Optional]
    public ?int $second;

    /**
     * `new PublicYearReference()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicYearReference::with(day: ..., month: ..., referenceType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicYearReference)->withDay(...)->withMonth(...)->withReferenceType(...)
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
     * @param ReferenceType|value-of<ReferenceType> $referenceType
     */
    public static function with(
        int $day,
        int $month,
        ReferenceType|string $referenceType = 'YEAR',
        ?int $hour = null,
        ?int $millisecond = null,
        ?int $minute = null,
        ?int $second = null,
    ): self {
        $self = new self;

        $self['day'] = $day;
        $self['month'] = $month;
        $self['referenceType'] = $referenceType;

        null !== $hour && $self['hour'] = $hour;
        null !== $millisecond && $self['millisecond'] = $millisecond;
        null !== $minute && $self['minute'] = $minute;
        null !== $second && $self['second'] = $second;

        return $self;
    }

    /**
     * The day component of the year reference.
     */
    public function withDay(int $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

        return $self;
    }

    /**
     * The month component of the year reference.
     */
    public function withMonth(int $month): self
    {
        $self = clone $this;
        $self['month'] = $month;

        return $self;
    }

    /**
     * Indicates the type of reference (YEAR).
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
     * The hour component of the year reference.
     */
    public function withHour(int $hour): self
    {
        $self = clone $this;
        $self['hour'] = $hour;

        return $self;
    }

    /**
     * The millisecond component of the year reference.
     */
    public function withMillisecond(int $millisecond): self
    {
        $self = clone $this;
        $self['millisecond'] = $millisecond;

        return $self;
    }

    /**
     * The minute component of the year reference.
     */
    public function withMinute(int $minute): self
    {
        $self = clone $this;
        $self['minute'] = $minute;

        return $self;
    }

    /**
     * The second component of the year reference.
     */
    public function withSecond(int $second): self
    {
        $self = clone $this;
        $self['second'] = $second;

        return $self;
    }
}
