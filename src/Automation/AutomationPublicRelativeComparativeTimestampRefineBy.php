<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationPublicRelativeComparativeTimestampRefineBy\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_public_relative_comparative_timestamp_refine_by = array{
 *   comparison: string,
 *   timeOffset: AutomationPublicTimeOffset,
 *   type: value-of<Type>,
 * }
 */
final class AutomationPublicRelativeComparativeTimestampRefineBy implements BaseModel
{
    /** @use SdkModel<automation_public_relative_comparative_timestamp_refine_by> */
    use SdkModel;

    #[Api]
    public string $comparison;

    #[Api]
    public AutomationPublicTimeOffset $timeOffset;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationPublicRelativeComparativeTimestampRefineBy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationPublicRelativeComparativeTimestampRefineBy::with(
     *   comparison: ..., timeOffset: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationPublicRelativeComparativeTimestampRefineBy)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $comparison,
        AutomationPublicTimeOffset $timeOffset,
        Type|string $type = 'RELATIVE_COMPARATIVE',
    ): self {
        $obj = new self;

        $obj->comparison = $comparison;
        $obj->timeOffset = $timeOffset;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withComparison(string $comparison): self
    {
        $obj = clone $this;
        $obj->comparison = $comparison;

        return $obj;
    }

    public function withTimeOffset(AutomationPublicTimeOffset $timeOffset): self
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
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
