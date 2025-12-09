<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicRelativeRangedTimestampRefineBy\Type;

/**
 * @phpstan-type PublicRelativeRangedTimestampRefineByShape = array{
 *   lowerBoundOffset: PublicTimeOffset,
 *   rangeType: string,
 *   type: value-of<Type>,
 *   upperBoundOffset: PublicTimeOffset,
 * }
 */
final class PublicRelativeRangedTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<PublicRelativeRangedTimestampRefineByShape> */
    use SdkModel;

    #[Required]
    public PublicTimeOffset $lowerBoundOffset;

    #[Required]
    public string $rangeType;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
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
     * @param PublicTimeOffset|array{
     *   amount: int, offsetDirection: string, timeUnit: string
     * } $lowerBoundOffset
     * @param PublicTimeOffset|array{
     *   amount: int, offsetDirection: string, timeUnit: string
     * } $upperBoundOffset
     * @param Type|value-of<Type> $type
     */
    public static function with(
        PublicTimeOffset|array $lowerBoundOffset,
        string $rangeType,
        PublicTimeOffset|array $upperBoundOffset,
        Type|string $type = 'RELATIVE_RANGED',
    ): self {
        $self = new self;

        $self['lowerBoundOffset'] = $lowerBoundOffset;
        $self['rangeType'] = $rangeType;
        $self['type'] = $type;
        $self['upperBoundOffset'] = $upperBoundOffset;

        return $self;
    }

    /**
     * @param PublicTimeOffset|array{
     *   amount: int, offsetDirection: string, timeUnit: string
     * } $lowerBoundOffset
     */
    public function withLowerBoundOffset(
        PublicTimeOffset|array $lowerBoundOffset
    ): self {
        $self = clone $this;
        $self['lowerBoundOffset'] = $lowerBoundOffset;

        return $self;
    }

    public function withRangeType(string $rangeType): self
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
     * @param PublicTimeOffset|array{
     *   amount: int, offsetDirection: string, timeUnit: string
     * } $upperBoundOffset
     */
    public function withUpperBoundOffset(
        PublicTimeOffset|array $upperBoundOffset
    ): self {
        $self = clone $this;
        $self['upperBoundOffset'] = $upperBoundOffset;

        return $self;
    }
}
