<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIStaticValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIStaticValueShape = array{
 *   staticValue: string, type: value-of<Type>
 * }
 */
final class APIStaticValue implements BaseModel
{
    /** @use SdkModel<APIStaticValueShape> */
    use SdkModel;

    /**
     * A static value to use as the input.
     */
    #[Api]
    public string $staticValue;

    /**
     * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIStaticValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIStaticValue::with(staticValue: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIStaticValue)->withStaticValue(...)->withType(...)
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
        string $staticValue,
        Type|string $type = 'STATIC_VALUE'
    ): self {
        $obj = new self;

        $obj->staticValue = $staticValue;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * A static value to use as the input.
     */
    public function withStaticValue(string $staticValue): self
    {
        $obj = clone $this;
        $obj->staticValue = $staticValue;

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
