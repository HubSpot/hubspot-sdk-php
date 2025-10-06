<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\PublicRelativeRangedTimestampRefineBy\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type public_relative_ranged_timestamp_refine_by = array{
 *   lowerBoundOffset: PublicTimeOffset,
 *   rangeType: string,
 *   type: value-of<Type>,
 *   upperBoundOffset: PublicTimeOffset,
 * }
 */
final class PublicRelativeRangedTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<public_relative_ranged_timestamp_refine_by> */
    use SdkModel;

    #[Api]
    public PublicTimeOffset $lowerBoundOffset;

    #[Api]
    public string $rangeType;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api]
    public PublicTimeOffset $upperBoundOffset;

    /**
     * `new PublicRelativeRangedTimestampRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicRelativeRangedTimestampRefineBy::with(
     *   lowerBoundOffset: ..., rangeType: ..., type: ..., upperBoundOffset: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicRelativeRangedTimestampRefineBy)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        PublicTimeOffset $lowerBoundOffset,
        string $rangeType,
        PublicTimeOffset $upperBoundOffset,
        Type|string $type = 'RELATIVE_RANGED',
    ): self {
        $obj = new self;

        $obj->lowerBoundOffset = $lowerBoundOffset;
        $obj->rangeType = $rangeType;
        $obj['type'] = $type;
        $obj->upperBoundOffset = $upperBoundOffset;

        return $obj;
    }

    public function withLowerBoundOffset(
        PublicTimeOffset $lowerBoundOffset
    ): self {
        $obj = clone $this;
        $obj->lowerBoundOffset = $lowerBoundOffset;

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

    public function withUpperBoundOffset(
        PublicTimeOffset $upperBoundOffset
    ): self {
        $obj = clone $this;
        $obj->upperBoundOffset = $upperBoundOffset;

        return $obj;
    }
}
