<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Events\Definitions\MonthReference\ReferenceType;

/**
 * @phpstan-type MonthReferenceShape = array{
 *   day: int,
 *   referenceType: ReferenceType|value-of<ReferenceType>,
 *   hour?: int|null,
 *   millisecond?: int|null,
 *   minute?: int|null,
 *   second?: int|null,
 * }
 */
final class MonthReference implements BaseModel
{
    /** @use SdkModel<MonthReferenceShape> */
    use SdkModel;

    #[Required]
    public int $day;

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
     * `new MonthReference()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MonthReference::with(day: ..., referenceType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MonthReference)->withDay(...)->withReferenceType(...)
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
        ReferenceType|string $referenceType = 'MONTH',
        ?int $hour = null,
        ?int $millisecond = null,
        ?int $minute = null,
        ?int $second = null,
    ): self {
        $self = new self;

        $self['day'] = $day;
        $self['referenceType'] = $referenceType;

        null !== $hour && $self['hour'] = $hour;
        null !== $millisecond && $self['millisecond'] = $millisecond;
        null !== $minute && $self['minute'] = $minute;
        null !== $second && $self['second'] = $second;

        return $self;
    }

    public function withDay(int $day): self
    {
        $self = clone $this;
        $self['day'] = $day;

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
