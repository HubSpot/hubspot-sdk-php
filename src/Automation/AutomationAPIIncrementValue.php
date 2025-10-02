<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\AutomationAPIIncrementValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type automation_api_increment_value = array{
 *   incrementAmount: float, type: value-of<Type>
 * }
 */
final class AutomationAPIIncrementValue implements BaseModel
{
    /** @use SdkModel<automation_api_increment_value> */
    use SdkModel;

    #[Api]
    public float $incrementAmount;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new AutomationAPIIncrementValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AutomationAPIIncrementValue::with(incrementAmount: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AutomationAPIIncrementValue)->withIncrementAmount(...)->withType(...)
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
        float $incrementAmount,
        Type|string $type = 'INCREMENT'
    ): self {
        $obj = new self;

        $obj->incrementAmount = $incrementAmount;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withIncrementAmount(float $incrementAmount): self
    {
        $obj = clone $this;
        $obj->incrementAmount = $incrementAmount;

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
