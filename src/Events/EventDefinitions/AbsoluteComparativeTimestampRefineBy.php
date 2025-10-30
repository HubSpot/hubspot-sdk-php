<?php

declare(strict_types=1);

namespace HubspotSDK\Events\EventDefinitions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Events\EventDefinitions\AbsoluteComparativeTimestampRefineBy\Comparison;
use HubspotSDK\Events\EventDefinitions\AbsoluteComparativeTimestampRefineBy\Type;

/**
 * @phpstan-type AbsoluteComparativeTimestampRefineByShape = array{
 *   comparison: value-of<Comparison>, timestamp: int, type: value-of<Type>
 * }
 */
final class AbsoluteComparativeTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<AbsoluteComparativeTimestampRefineByShape> */
    use SdkModel;

    /** @var value-of<Comparison> $comparison */
    #[Api(enum: Comparison::class)]
    public string $comparison;

    #[Api]
    public int $timestamp;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
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
        $obj = new self;

        $obj['comparison'] = $comparison;
        $obj->timestamp = $timestamp;
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

    public function withTimestamp(int $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

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
