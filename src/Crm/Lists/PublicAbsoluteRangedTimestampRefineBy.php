<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Lists;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Lists\PublicAbsoluteRangedTimestampRefineBy\Type;

/**
 * @phpstan-type PublicAbsoluteRangedTimestampRefineByShape = array{
 *   lowerTimestamp: int,
 *   rangeType: string,
 *   type: Type|value-of<Type>,
 *   upperTimestamp: int,
 * }
 */
final class PublicAbsoluteRangedTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<PublicAbsoluteRangedTimestampRefineByShape> */
    use SdkModel;

    /**
     * Lower range timestamp of refinement criteria.
     */
    #[Required]
    public int $lowerTimestamp;

    /**
     * Type of range of refinement critaria (BETWEEN, NOT_BETWEEN).
     */
    #[Required]
    public string $rangeType;

    /**
     * type of refine by criteria (ABSOLUTE_RANGED).
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Upper range timestamp of refinement criteria.
     */
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

    /**
     * Lower range timestamp of refinement criteria.
     */
    public function withLowerTimestamp(int $lowerTimestamp): self
    {
        $self = clone $this;
        $self['lowerTimestamp'] = $lowerTimestamp;

        return $self;
    }

    /**
     * Type of range of refinement critaria (BETWEEN, NOT_BETWEEN).
     */
    public function withRangeType(string $rangeType): self
    {
        $self = clone $this;
        $self['rangeType'] = $rangeType;

        return $self;
    }

    /**
     * type of refine by criteria (ABSOLUTE_RANGED).
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
     * Upper range timestamp of refinement criteria.
     */
    public function withUpperTimestamp(int $upperTimestamp): self
    {
        $self = clone $this;
        $self['upperTimestamp'] = $upperTimestamp;

        return $self;
    }
}
