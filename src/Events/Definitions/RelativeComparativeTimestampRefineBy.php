<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Events\Definitions\RelativeComparativeTimestampRefineBy\Comparison;
use HubSpotSDK\Events\Definitions\RelativeComparativeTimestampRefineBy\Type;

/**
 * @phpstan-import-type TimeOffsetShape from \HubSpotSDK\Events\Definitions\TimeOffset
 *
 * @phpstan-type RelativeComparativeTimestampRefineByShape = array{
 *   comparison: Comparison|value-of<Comparison>,
 *   timeOffset: TimeOffset|TimeOffsetShape,
 *   type: Type|value-of<Type>,
 * }
 */
final class RelativeComparativeTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<RelativeComparativeTimestampRefineByShape> */
    use SdkModel;

    /** @var value-of<Comparison> $comparison */
    #[Required(enum: Comparison::class)]
    public string $comparison;

    #[Required]
    public TimeOffset $timeOffset;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new RelativeComparativeTimestampRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RelativeComparativeTimestampRefineBy::with(
     *   comparison: ..., timeOffset: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RelativeComparativeTimestampRefineBy)
     *   ->withComparison(...)
     *   ->withTimeOffset(...)
     *   ->withType(...)
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
     * @param Comparison|value-of<Comparison> $comparison
     * @param TimeOffset|TimeOffsetShape $timeOffset
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Comparison|string $comparison,
        TimeOffset|array $timeOffset,
        Type|string $type = 'RelativeComparativeTimestampRefineBy',
    ): self {
        $self = new self;

        $self['comparison'] = $comparison;
        $self['timeOffset'] = $timeOffset;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param Comparison|value-of<Comparison> $comparison
     */
    public function withComparison(Comparison|string $comparison): self
    {
        $self = clone $this;
        $self['comparison'] = $comparison;

        return $self;
    }

    /**
     * @param TimeOffset|TimeOffsetShape $timeOffset
     */
    public function withTimeOffset(TimeOffset|array $timeOffset): self
    {
        $self = clone $this;
        $self['timeOffset'] = $timeOffset;

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
}
