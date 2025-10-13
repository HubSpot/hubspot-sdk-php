<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIIncrementValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_increment_value = array{
 *   incrementAmount: float, type: value-of<Type>
 * }
 */
final class APIIncrementValue implements BaseModel
{
    /** @use SdkModel<api_increment_value> */
    use SdkModel;

    /**
     * The amount be which to increment.
     */
    #[Api]
    public float $incrementAmount;

    /**
     * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIIncrementValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIIncrementValue::with(incrementAmount: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIIncrementValue)->withIncrementAmount(...)->withType(...)
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
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The amount be which to increment.
     */
    public function withIncrementAmount(float $incrementAmount): self
    {
        $obj = clone $this;
        $obj->incrementAmount = $incrementAmount;

        return $obj;
    }

    /**
     * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
