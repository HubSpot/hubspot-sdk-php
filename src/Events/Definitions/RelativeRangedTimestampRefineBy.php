<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Events\Definitions\RelativeRangedTimestampRefineBy\RangeType;
use HubSpotSDK\Events\Definitions\RelativeRangedTimestampRefineBy\Type;

/**
 * @phpstan-import-type TimeOffsetShape from \HubSpotSDK\Events\Definitions\TimeOffset
 *
 * @phpstan-type RelativeRangedTimestampRefineByShape = array{
 *   lowerBoundOffset: TimeOffset|TimeOffsetShape,
 *   rangeType: RangeType|value-of<RangeType>,
 *   type: Type|value-of<Type>,
 *   upperBoundOffset: TimeOffset|TimeOffsetShape,
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
     * @param TimeOffset|TimeOffsetShape $lowerBoundOffset
     * @param RangeType|value-of<RangeType> $rangeType
     * @param TimeOffset|TimeOffsetShape $upperBoundOffset
     * @param Type|value-of<Type> $type
     */
    public static function with(
        TimeOffset|array $lowerBoundOffset,
        RangeType|string $rangeType,
        TimeOffset|array $upperBoundOffset,
        Type|string $type = 'RelativeRangedTimestampRefineBy',
    ): self {
        $self = new self;

        $self['lowerBoundOffset'] = $lowerBoundOffset;
        $self['rangeType'] = $rangeType;
        $self['type'] = $type;
        $self['upperBoundOffset'] = $upperBoundOffset;

        return $self;
    }

    /**
     * @param TimeOffset|TimeOffsetShape $lowerBoundOffset
     */
    public function withLowerBoundOffset(
        TimeOffset|array $lowerBoundOffset
    ): self {
        $self = clone $this;
        $self['lowerBoundOffset'] = $lowerBoundOffset;

        return $self;
    }

    /**
     * @param RangeType|value-of<RangeType> $rangeType
     */
    public function withRangeType(RangeType|string $rangeType): self
    {
        $self = clone $this;
        $self['rangeType'] = $rangeType;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param TimeOffset|TimeOffsetShape $upperBoundOffset
     */
    public function withUpperBoundOffset(
        TimeOffset|array $upperBoundOffset
    ): self {
        $self = clone $this;
        $self['upperBoundOffset'] = $upperBoundOffset;

        return $self;
    }
}
