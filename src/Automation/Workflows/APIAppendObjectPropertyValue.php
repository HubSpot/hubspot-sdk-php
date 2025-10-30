<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIAppendObjectPropertyValue\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIAppendObjectPropertyValueShape = array{
 *   appendPropertyName: string, type: value-of<Type>
 * }
 */
final class APIAppendObjectPropertyValue implements BaseModel
{
    /** @use SdkModel<APIAppendObjectPropertyValueShape> */
    use SdkModel;

    /**
     * The name of the property to append data from.
     */
    #[Api]
    public string $appendPropertyName;

    /**
     * This is the type of input value. This can be one of: "FIELD_DATA", "OBJECT_PROPERTY", "STATIC_VALUE", "RELATIVE_DATETIME", "TIMESTAMP", "INCREMENT", "FETCHED_OBJECT_PROPERTY", "APPEND_OBJECT_PROPERTY", "STATIC_APPEND_VALUE", "ENROLLMENT_EVENT_PROPERTY".
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIAppendObjectPropertyValue()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIAppendObjectPropertyValue::with(appendPropertyName: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIAppendObjectPropertyValue)->withAppendPropertyName(...)->withType(...)
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
        string $appendPropertyName,
        Type|string $type = 'APPEND_OBJECT_PROPERTY'
    ): self {
        $obj = new self;

        $obj->appendPropertyName = $appendPropertyName;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The name of the property to append data from.
     */
    public function withAppendPropertyName(string $appendPropertyName): self
    {
        $obj = clone $this;
        $obj->appendPropertyName = $appendPropertyName;

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
