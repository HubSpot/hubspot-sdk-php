<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicWeekReference\DayOfWeek;
use HubspotSDK\PublicWeekReference\ReferenceType;

/**
 * @phpstan-type PublicWeekReferenceShape = array{
 *   dayOfWeek: value-of<DayOfWeek>,
 *   referenceType: value-of<ReferenceType>,
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
        $obj = new self;

        $obj['dayOfWeek'] = $dayOfWeek;
        $obj['referenceType'] = $referenceType;

        null !== $hour && $obj['hour'] = $hour;
        null !== $millisecond && $obj['millisecond'] = $millisecond;
        null !== $minute && $obj['minute'] = $minute;
        null !== $second && $obj['second'] = $second;

        return $obj;
    }

    /**
     * @param DayOfWeek|value-of<DayOfWeek> $dayOfWeek
     */
    public function withDayOfWeek(DayOfWeek|string $dayOfWeek): self
    {
        $obj = clone $this;
        $obj['dayOfWeek'] = $dayOfWeek;

        return $obj;
    }

    /**
     * @param ReferenceType|value-of<ReferenceType> $referenceType
     */
    public function withReferenceType(ReferenceType|string $referenceType): self
    {
        $obj = clone $this;
        $obj['referenceType'] = $referenceType;

        return $obj;
    }

    public function withHour(int $hour): self
    {
        $obj = clone $this;
        $obj['hour'] = $hour;

        return $obj;
    }

    public function withMillisecond(int $millisecond): self
    {
        $obj = clone $this;
        $obj['millisecond'] = $millisecond;

        return $obj;
    }

    public function withMinute(int $minute): self
    {
        $obj = clone $this;
        $obj['minute'] = $minute;

        return $obj;
    }

    public function withSecond(int $second): self
    {
        $obj = clone $this;
        $obj['second'] = $second;

        return $obj;
    }
}
