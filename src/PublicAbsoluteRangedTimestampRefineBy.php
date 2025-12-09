<?php

declare(strict_types=1);

namespace HubspotSDK;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\PublicAbsoluteRangedTimestampRefineBy\Type;

/**
 * @phpstan-type PublicAbsoluteRangedTimestampRefineByShape = array{
 *   lowerTimestamp: int,
 *   rangeType: string,
 *   type: value-of<Type>,
 *   upperTimestamp: int,
 * }
 */
final class PublicAbsoluteRangedTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<PublicAbsoluteRangedTimestampRefineByShape> */
    use SdkModel;

    #[Required]
    public int $lowerTimestamp;

    #[Required]
    public string $rangeType;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    #[Required]
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

    public function withUpperTimestamp(int $upperTimestamp): self
    {
        $self = clone $this;
        $self['upperTimestamp'] = $upperTimestamp;

        return $self;
    }
}
