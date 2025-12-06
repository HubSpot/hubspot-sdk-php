<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\AbsoluteRangedTimestampRefineBy\RangeType;
use HubspotSDK\Events\EventDefinitions\AbsoluteRangedTimestampRefineBy\Type;

/**
 * @phpstan-type AbsoluteRangedTimestampRefineByShape = array{
 *   lowerTimestamp: int,
 *   rangeType: value-of<RangeType>,
 *   type: value-of<Type>,
 *   upperTimestamp: int,
 * }
 */
final class AbsoluteRangedTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<AbsoluteRangedTimestampRefineByShape> */
    use SdkModel;

    #[Api]
    public int $lowerTimestamp;

    /** @var value-of<RangeType> $rangeType */
    #[Api(enum: RangeType::class)]
    public string $rangeType;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
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
        $obj = new self;

        $obj['lowerTimestamp'] = $lowerTimestamp;
        $obj['rangeType'] = $rangeType;
        $obj['type'] = $type;
        $obj['upperTimestamp'] = $upperTimestamp;

        return $obj;
    }

    public function withLowerTimestamp(int $lowerTimestamp): self
    {
        $obj = clone $this;
        $obj['lowerTimestamp'] = $lowerTimestamp;

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

    public function withUpperTimestamp(int $upperTimestamp): self
    {
        $obj = clone $this;
        $obj['upperTimestamp'] = $upperTimestamp;

        return $obj;
    }
}
