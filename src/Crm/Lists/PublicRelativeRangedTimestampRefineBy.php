<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Lists;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Lists\PublicRelativeRangedTimestampRefineBy\Type;

/**
 * @phpstan-import-type PublicTimeOffsetShape from \HubSpotSDK\Crm\Lists\PublicTimeOffset
 *
 * @phpstan-type PublicRelativeRangedTimestampRefineByShape = array{
 *   lowerBoundOffset: PublicTimeOffset|PublicTimeOffsetShape,
 *   rangeType: string,
 *   type: Type|value-of<Type>,
 *   upperBoundOffset: PublicTimeOffset|PublicTimeOffsetShape,
 * }
 */
final class PublicRelativeRangedTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<PublicRelativeRangedTimestampRefineByShape> */
    use SdkModel;

    #[Required]
    public PublicTimeOffset $lowerBoundOffset;

    /**
     * Specifies the type of range for the refinement criteria (BETWEEN, NOT_BETWEEN).
     */
    #[Required]
    public string $rangeType;

    /**
     * Indicates the type of refinement (RELATIVE_RANGED).
     *
     * @var value-of<Type> $type
     */
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
     * @param PublicTimeOffset|PublicTimeOffsetShape $lowerBoundOffset
     * @param PublicTimeOffset|PublicTimeOffsetShape $upperBoundOffset
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
     * @param PublicTimeOffset|PublicTimeOffsetShape $lowerBoundOffset
     */
    public function withLowerBoundOffset(
        PublicTimeOffset|array $lowerBoundOffset
    ): self {
        $self = clone $this;
        $self['lowerBoundOffset'] = $lowerBoundOffset;

        return $self;
    }

    /**
     * Specifies the type of range for the refinement criteria (BETWEEN, NOT_BETWEEN).
     */
    public function withRangeType(string $rangeType): self
    {
        $self = clone $this;
        $self['rangeType'] = $rangeType;

        return $self;
    }

    /**
     * Indicates the type of refinement (RELATIVE_RANGED).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param PublicTimeOffset|PublicTimeOffsetShape $upperBoundOffset
     */
    public function withUpperBoundOffset(
        PublicTimeOffset|array $upperBoundOffset
    ): self {
        $self = clone $this;
        $self['upperBoundOffset'] = $upperBoundOffset;

        return $self;
    }
}
