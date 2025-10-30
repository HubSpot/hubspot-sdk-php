<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIStaticAppendValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIStaticAppendValueShape = array{
 *   staticAppendValue: string, type: value-of<Type>
 * }
 */
final class APIStaticAppendValue implements BaseModel
{
    /** @use SdkModel<APIStaticAppendValueShape> */
    use SdkModel;

    /**
     * The value to append.
     */
    #[Api]
    public string $staticAppendValue;

    /**
     * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIStaticAppendValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIStaticAppendValue::with(staticAppendValue: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIStaticAppendValue)->withStaticAppendValue(...)->withType(...)
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
        string $staticAppendValue,
        Type|string $type = 'STATIC_APPEND_VALUE'
    ): self {
        $obj = new self;

        $obj->staticAppendValue = $staticAppendValue;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The value to append.
     */
    public function withStaticAppendValue(string $staticAppendValue): self
    {
        $obj = clone $this;
        $obj->staticAppendValue = $staticAppendValue;

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
