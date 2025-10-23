<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\RelativeComparativeTimestampRefineBy\Comparison;
use HubspotSDK\Events\EventDefinitions\RelativeComparativeTimestampRefineBy\Type;

/**
 * @phpstan-type relative_comparative_timestamp_refine_by = array{
 *   comparison: value-of<Comparison>, timeOffset: TimeOffset, type: value-of<Type>
 * }
 */
final class RelativeComparativeTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<relative_comparative_timestamp_refine_by> */
    use SdkModel;

    /** @var value-of<Comparison> $comparison */
    #[Api(enum: Comparison::class)]
    public string $comparison;

    #[Api]
    public TimeOffset $timeOffset;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Comparison|string $comparison,
        TimeOffset $timeOffset,
        Type|string $type = 'RelativeComparativeTimestampRefineBy',
    ): self {
        $obj = new self;

        $obj['comparison'] = $comparison;
        $obj->timeOffset = $timeOffset;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param Comparison|value-of<Comparison> $comparison
     */
    public function withComparison(Comparison|string $comparison): self
    {
        $obj = clone $this;
        $obj['comparison'] = $comparison;

        return $obj;
    }

    public function withTimeOffset(TimeOffset $timeOffset): self
    {
        $obj = clone $this;
        $obj->timeOffset = $timeOffset;

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
}
