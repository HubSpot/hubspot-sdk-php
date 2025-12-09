<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\RelativeRangedTimestampRefineBy\RangeType;
use HubspotSDK\Events\EventDefinitions\RelativeRangedTimestampRefineBy\Type;
use HubspotSDK\Events\EventDefinitions\TimeOffset\OffsetDirection;
use HubspotSDK\Events\EventDefinitions\TimeOffset\TimeUnit;

/**
 * @phpstan-type RelativeRangedTimestampRefineByShape = array{
 *   lowerBoundOffset: TimeOffset,
 *   rangeType: value-of<RangeType>,
 *   type: value-of<Type>,
 *   upperBoundOffset: TimeOffset,
 * }
 */
final class RelativeRangedTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<RelativeRangedTimestampRefineByShape> */
    use SdkModel;

    #[Required]
    public TimeOffset $lowerBoundOffset;

    /** @var value-of<RangeType> $rangeType */
    #[Required(enum: RangeType::class)]
    public string $rangeType;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
    public TimeOffset $upperBoundOffset;

    /**
     * `new RelativeRangedTimestampRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RelativeRangedTimestampRefineBy::with(
     *   lowerBoundOffset: ..., rangeType: ..., type: ..., upperBoundOffset: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RelativeRangedTimestampRefineBy)
     *   ->withLowerBoundOffset(...)
     *   ->withRangeType(...)
     *   ->withType(...)
     *   ->withUpperBoundOffset(...)
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
     * @param TimeOffset|array{
     *   amount: int,
     *   offsetDirection: value-of<OffsetDirection>,
     *   timeUnit: value-of<TimeUnit>,
     * } $lowerBoundOffset
     * @param RangeType|value-of<RangeType> $rangeType
     * @param TimeOffset|array{
     *   amount: int,
     *   offsetDirection: value-of<OffsetDirection>,
     *   timeUnit: value-of<TimeUnit>,
     * } $upperBoundOffset
     * @param Type|value-of<Type> $type
     */
    public static function with(
        TimeOffset|array $lowerBoundOffset,
        RangeType|string $rangeType,
        TimeOffset|array $upperBoundOffset,
        Type|string $type = 'RelativeRangedTimestampRefineBy',
    ): self {
        $obj = new self;

        $obj['lowerBoundOffset'] = $lowerBoundOffset;
        $obj['rangeType'] = $rangeType;
        $obj['type'] = $type;
        $obj['upperBoundOffset'] = $upperBoundOffset;

        return $obj;
    }

    /**
     * @param TimeOffset|array{
     *   amount: int,
     *   offsetDirection: value-of<OffsetDirection>,
     *   timeUnit: value-of<TimeUnit>,
     * } $lowerBoundOffset
     */
    public function withLowerBoundOffset(
        TimeOffset|array $lowerBoundOffset
    ): self {
        $obj = clone $this;
        $obj['lowerBoundOffset'] = $lowerBoundOffset;

        return $obj;
    }

    /**
     * @param RangeType|value-of<RangeType> $rangeType
     */
    public function withRangeType(RangeType|string $rangeType): self
    {
        $obj = clone $this;
        $obj['rangeType'] = $rangeType;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param TimeOffset|array{
     *   amount: int,
     *   offsetDirection: value-of<OffsetDirection>,
     *   timeUnit: value-of<TimeUnit>,
     * } $upperBoundOffset
     */
    public function withUpperBoundOffset(
        TimeOffset|array $upperBoundOffset
    ): self {
        $obj = clone $this;
        $obj['upperBoundOffset'] = $upperBoundOffset;

        return $obj;
    }
}
