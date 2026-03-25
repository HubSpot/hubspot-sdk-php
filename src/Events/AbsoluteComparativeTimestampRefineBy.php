<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\AbsoluteComparativeTimestampRefineBy\Comparison;
use HubspotSDK\Events\AbsoluteComparativeTimestampRefineBy\Type;

/**
 * @phpstan-type AbsoluteComparativeTimestampRefineByShape = array{
 *   comparison: Comparison|value-of<Comparison>,
 *   timestamp: int,
 *   type: Type|value-of<Type>,
 * }
 */
final class AbsoluteComparativeTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<AbsoluteComparativeTimestampRefineByShape> */
    use SdkModel;

    /** @var value-of<Comparison> $comparison */
    #[Required(enum: Comparison::class)]
    public string $comparison;

    #[Required]
    public int $timestamp;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new AbsoluteComparativeTimestampRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AbsoluteComparativeTimestampRefineBy::with(
     *   comparison: ..., timestamp: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AbsoluteComparativeTimestampRefineBy)
     *   ->withComparison(...)
     *   ->withTimestamp(...)
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
        int $timestamp,
        Type|string $type = 'AbsoluteComparativeTimestampRefineBy',
    ): self {
        $self = new self;

        $self['comparison'] = $comparison;
        $self['timestamp'] = $timestamp;
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

    public function withTimestamp(int $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

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
