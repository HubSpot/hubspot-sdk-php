<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicAbsoluteComparativeTimestampRefineBy\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_absolute_comparative_timestamp_refine_by = array{
 *   comparison: string, timestamp: int, type: value-of<Type>
 * }
 */
final class AutomationPublicAbsoluteComparativeTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<automation_public_absolute_comparative_timestamp_refine_by> */
    use SdkModel;

    #[Api]
    public string $comparison;

    #[Api]
    public int $timestamp;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationPublicAbsoluteComparativeTimestampRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicAbsoluteComparativeTimestampRefineBy::with(
     *   comparison: ..., timestamp: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicAbsoluteComparativeTimestampRefineBy)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $comparison,
        int $timestamp,
        Type|string $type = 'ABSOLUTE_COMPARATIVE',
    ): self {
        $obj = new self;

        $obj->comparison = $comparison;
        $obj->timestamp = $timestamp;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withComparison(string $comparison): self
    {
        $obj = clone $this;
        $obj->comparison = $comparison;

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
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
