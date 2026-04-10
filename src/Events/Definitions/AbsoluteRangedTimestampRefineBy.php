<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Events\Definitions\AbsoluteRangedTimestampRefineBy\RangeType;
use HubSpotSDK\Events\Definitions\AbsoluteRangedTimestampRefineBy\Type;

/**
 * @phpstan-type AbsoluteRangedTimestampRefineByShape = array{
 *   lowerTimestamp: int,
 *   rangeType: RangeType|value-of<RangeType>,
 *   type: Type|value-of<Type>,
 *   upperTimestamp: int,
 * }
 */
final class AbsoluteRangedTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<AbsoluteRangedTimestampRefineByShape> */
    use SdkModel;

    #[Required]
    public int $lowerTimestamp;

    /** @var value-of<RangeType> $rangeType */
    #[Required(enum: RangeType::class)]
    public string $rangeType;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
    public int $upperTimestamp;

    /**
     * `new AbsoluteRangedTimestampRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbsoluteRangedTimestampRefineBy::with(
     *   lowerTimestamp: ..., rangeType: ..., type: ..., upperTimestamp: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AbsoluteRangedTimestampRefineBy)
     *   ->withLowerTimestamp(...)
     *   ->withRangeType(...)
     *   ->withType(...)
     *   ->withUpperTimestamp(...)
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
     * @param RangeType|value-of<RangeType> $rangeType
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $lowerTimestamp,
        RangeType|string $rangeType,
        int $upperTimestamp,
        Type|string $type = 'AbsoluteRangedTimestampRefineBy',
    ): self {
        $self = new self;

        $self['lowerTimestamp'] = $lowerTimestamp;
        $self['rangeType'] = $rangeType;
        $self['type'] = $type;
        $self['upperTimestamp'] = $upperTimestamp;

        return $self;
    }

    public function withLowerTimestamp(int $lowerTimestamp): self
    {
        $self = clone $this;
        $self['lowerTimestamp'] = $lowerTimestamp;

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

    public function withUpperTimestamp(int $upperTimestamp): self
    {
        $self = clone $this;
        $self['upperTimestamp'] = $upperTimestamp;

        return $self;
    }
}
