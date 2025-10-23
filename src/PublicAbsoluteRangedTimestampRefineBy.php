<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAbsoluteRangedTimestampRefineBy\Type;

/**
 * @phpstan-type public_absolute_ranged_timestamp_refine_by = array{
 *   lowerTimestamp: int,
 *   rangeType: string,
 *   type: value-of<Type>,
 *   upperTimestamp: int,
 * }
 */
final class PublicAbsoluteRangedTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<public_absolute_ranged_timestamp_refine_by> */
    use SdkModel;

    #[Api]
    public int $lowerTimestamp;

    #[Api]
    public string $rangeType;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public int $upperTimestamp;

    /**
     * `new PublicAbsoluteRangedTimestampRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicAbsoluteRangedTimestampRefineBy::with(
     *   lowerTimestamp: ..., rangeType: ..., type: ..., upperTimestamp: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicAbsoluteRangedTimestampRefineBy)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $lowerTimestamp,
        string $rangeType,
        int $upperTimestamp,
        Type|string $type = 'ABSOLUTE_RANGED',
    ): self {
        $obj = new self;

        $obj->lowerTimestamp = $lowerTimestamp;
        $obj->rangeType = $rangeType;
        $obj['type'] = $type;
        $obj->upperTimestamp = $upperTimestamp;

        return $obj;
    }

    public function withLowerTimestamp(int $lowerTimestamp): self
    {
        $obj = clone $this;
        $obj->lowerTimestamp = $lowerTimestamp;

        return $obj;
    }

    public function withRangeType(string $rangeType): self
    {
        $obj = clone $this;
        $obj->rangeType = $rangeType;

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
        $obj->upperTimestamp = $upperTimestamp;

        return $obj;
    }
}
